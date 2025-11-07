<?php
// Koneksi ke database
include "koneksi.php";

// Query SQL untuk membuat tabel
$query = "CREATE TABLE user (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
)";

// Eksekusi query menggunakan mysqli_query()
$result = mysqli_query($connect, $query);

// Cek hasil
if($result) {
    echo "Tabel user berhasil dibuat";
} else {
    echo "Gagal membuat tabel: " . mysqli_error($connect);
}
?>