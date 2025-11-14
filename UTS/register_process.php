<?php
// FILE BARU: Proses registrasi admin baru
session_start();
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST["full_name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';
    $confirm_password = $_POST["confirm_password"] ?? '';

    // Validasi input kosong
    if (empty($full_name) || empty($email) || empty($password)) {
        $_SESSION['error_message'] = 'All fields are required!';
        header("Location: register.php");
        exit;
    }

    // Validasi password match
    if ($password !== $confirm_password) {
        $_SESSION['error_message'] = 'Passwords do not match!';
        header("Location: register.php");
        exit;
    }

    // Validasi panjang password
    if (strlen($password) < 6) {
        $_SESSION['error_message'] = 'Password must be at least 6 characters!';
        header("Location: register.php");
        exit;
    }

    // Cek email sudah terdaftar atau belum
    $check_sql = 'SELECT email FROM users WHERE email = $1';
    $check_result = pg_query_params($conn, $check_sql, [$email]);
    
    if (pg_num_rows($check_result) > 0) {
        $_SESSION['error_message'] = 'Email already registered!';
        header("Location: register.php");
        exit;
    }

    // Insert user baru
    $insert_sql = 'INSERT INTO users (full_name, email, password) VALUES ($1, $2, $3)';
    $result = pg_query_params($conn, $insert_sql, [$full_name, $email, $password]);

    if ($result) {
        $_SESSION['success_message'] = 'Registration successful! Please login.';
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['error_message'] = 'Registration failed: ' . pg_last_error($conn);
        header("Location: register.php");
        exit;
    }
} else {
    header("Location: register.php");
    exit;
}

pg_close($conn);
?>