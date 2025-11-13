<?php
session_start(); 

require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = $_POST["email"] ?? ''; 
    $password = $_POST["password"] ?? '';

    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = 'Email dan password harus diisi.';
        header("Location: login.php");
        exit;
    }

    $sql = 'SELECT * FROM users WHERE email = $1';
    $result = pg_query_params($conn, $sql, [$email]);

    if ($result) {
        if (pg_num_rows($result) == 1) {
            $user = pg_fetch_assoc($result);

            if ($password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['full_name'];
                
                unset($_SESSION['error_message']);
                header("Location: dashboard.php");
                exit; 

            } else {
                $_SESSION['error_message'] = 'Email atau password salah.';
                header("Location: login.php"); 
                exit;
            }
        } else {
            $_SESSION['error_message'] = 'Email atau password salah.'; 
            header("Location: login.php"); 
            exit;
        }
    } else {
        $_SESSION['error_message'] = 'Query database gagal: ' . pg_last_error($conn); 
        header("Location: login.php");
        exit;
    }

} else {
    header("Location: login.php");
    exit;
}

pg_close($conn); //menutup koneksi database
?>