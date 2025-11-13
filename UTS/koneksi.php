<?php

$host = 'localhost';
$port = '5432';
$dbname = 'nail_art';
$user = 'postgres';
$pass = '123';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
if (!$conn) {
    $_SESSION['error_message'] = 'Koneksi database gagal.';
    header("Location: login.php");
    exit;
}
pg_set_client_encoding($conn, 'UTF8'); 