<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['input']) && isset($_POST['email'])) {

        $input = $_POST['input'];

        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Input yang Anda masukkan adalah: " . $input . "<br>";
        echo "Email yang Anda masukkan adalah: " . $email;        } else {
        echo "Email yang Anda masukkan tidak valid.";
        }
    } else {
        echo "Tidak ada input yang diterima.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
</head>
<body>
    <h1>Form Input dengan Validasi Email</h1>
    <form action="html_aman.php" method="POST">
        <label for="input">Masukkan Input:</label>
        <input type="text" id="input" name="input" required><br><br>

        <label for="email">Masukkan Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
