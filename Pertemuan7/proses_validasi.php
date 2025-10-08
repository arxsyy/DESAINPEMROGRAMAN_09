<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $errors = array();

    // Validasi nama
    if (empty($nama)) {
        $errors[] = "Nama harus diisi.";
    }

    // Validasi email
    if (empty($email)) {
        $errors[] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    // Validasi password
    if (strlen($password) < 8) {
        $errors[] = "Password minimal 8 karakter.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<span style='color:red'>$error</span><br>";
        }
    } else {
        echo "<span style='color:green'>Data berhasil dikirim:</span><br>";
        echo "Nama: $nama<br>Email: $email<br>Password: $password";
    }
}
?>