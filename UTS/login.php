<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Member</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <div class="container">
    <header>
        <h1>Login Admin</h1>
    </header>
    
    <form id="myForm" method="post" action="login_process.php"> 
        
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<div id="form-error" style="color: red; margin-bottom: 15px; font-weight: 600;">'; 
            echo htmlspecialchars($_SESSION['error_message']); 
            echo '</div>';
            
            unset($_SESSION['error_message']);
        }
        ?>

        <label for="email">Email : </label>
        <input type="text" id="email" name="email" required> <br>
        <br>

        <label for="password">Password : </label>
        <input type="password" id="password" name="password" required> <br>
        <br>

        <input type="submit" value="Login">
    </form>
</div>

    </body>
</html>