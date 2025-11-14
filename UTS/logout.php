<?php
// FILE BARU: Logout system - hapus session dan redirect
session_start();

session_unset();
session_destroy();

session_start();
$_SESSION['success_message'] = 'You have been logged out successfully.';

header("Location: login.php");
exit;
?>