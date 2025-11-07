<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "prakwebdb";

$connect = mysqli_connect($host, $user, $pass, $db);

if(!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>