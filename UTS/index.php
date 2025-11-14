<?php
session_start(); // BARU: Tracking user session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #fce4ec;
            background-image: url('wlp4.png');
            background-repeat: repeat;
            font-family: 'Quicksand', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 350px;
            border: 1px solid #ff4081;
            border-radius: 10px;
            background-color: #fff;
            padding: 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .welcome-title {
            color: #ff4081;
            text-align: center;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 20px;
            font-family: "Quicksand", sans-serif;
        }

        .card img {
            margin: 0 auto 15px;
            height: 125px;
        }

        .card-title {
            color: #ff4081;
            font-weight: bold;
            font-size: 1.25rem;
            margin-bottom: 15px;
        }

        .card-text {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            background-color: #ff4081;
            border: 1px solid #ff4081;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn:hover {
            background-color: #e91e63;
            border-color: #e91e63;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1 class="welcome-title">Welcome to Nailash Salon!</h1>

        <img src="nailart.jpg" alt="Nailart Treatment">
        <h5 class="card-title">Nailart Treatment💅🏻</h5>
        <p class="card-text">
            Want to look more stunning?<br>
            Fill out the form below<br>
            to book our best beauty care services.🌟
        </p>
        
        <a href="booking.php" class="btn">Book Now!</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>