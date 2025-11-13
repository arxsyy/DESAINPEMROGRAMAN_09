<?php
require_once 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil input
    $name   = $_POST["name"]  ?? '';
    $phone  = $_POST["phone"] ?? '';
    $person = (int)($_POST["person"] ?? 0);
    $type   = $_POST["type"]  ?? '';     // gel | extension | pedicure
    $remove = $_POST["remove"] ?? '';    // Yes | No
    $date   = $_POST["date"]  ?? '';
    $time   = $_POST["time"]  ?? '';

    // Validasi minimal (sesuai permintaan)
    $errors = [];
    if ($name === '') $errors[] = "Please enter your name!";
    if ($date === '') $errors[] = "Please select a schedule!";
    if ($time === '') $errors[] = "Please select a schedule!";

    if (!empty($errors)) {
        // Tampilkan sederhana (atau bisa balik ke form + kirim pesan via session)
        foreach ($errors as $e) echo $e . "<br>";
        echo '<br><a href="javascript:history.back()">Back</a>';
        exit;
    }

    // Normalisasi ringan biar aman saat INSERT
    if (!in_array($type, ['gel','extension','pedicure'])) $type = 'gel';
    if (!in_array($remove, ['Yes','No'])) $remove = 'No';
    if ($person <= 0) $person = 1;

    // INSERT (mapping ke kolom Postgres versi kamu)
    // Tabel: bookings(id, name, phone, person, type, remove_option, booking_date, booking_time, status)
    $sql = "INSERT INTO bookings
            (name, phone, person, type, remove_option, booking_date, booking_time, status)
            VALUES ($1, $2, $3, $4, $5, $6, $7, 'pending')";
    $params = [$name, $phone, $person, $type, $remove, $date, $time];
    $res = pg_query_params($conn, $sql, $params);

    if (!$res) {
        echo "Failed to save booking.";
        exit;
    }

    // PRG (Post/Redirect/Get) untuk cegah resubmit saat refresh
    header('Location: home.php');
    exit;
}
