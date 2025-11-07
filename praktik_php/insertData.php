<?php
include "koneksi.php";

// Query untuk insert data
$query = "INSERT INTO user (username, password) 
            VALUES ('admin', MD5('123'))";

$result = mysqli_query($connect, $query);

if($result) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Gagal menambahkan data: " . mysqli_error($connect);
}
?>