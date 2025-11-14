<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #fce4ec;
            background-image: url('wlp4.png');
            background-repeat: repeat;
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            width: 100%;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 2px solid #d81b60;
            font-family: "Quicksand", sans-serif;
        }

        /* BARU: Header di dalam container */
        .container h1 {
            color: #d81b60;
            text-align: center;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 25px;
            margin-top: 0;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #333;
        }

        form input,
        form select {
            width: 100%;
            box-sizing: border-box;
            padding: 7px 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.95rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        form input:focus,
        form select:focus {
            border-color: #d81b60;
            outline: none;
            box-shadow: 0 0 5px rgba(216, 27, 96, 0.5);
        }

        form input[type="submit"] {
            background-color: #d81b60;
            color: white;
            border: none;
            padding: 9px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
            font-weight: 600;
        }

        form input[type="submit"]:hover {
            background-color: #c2185b;
            transform: scale(1.02);
        }

        .text-center {
            text-align: center;
            margin-top: 15px;
        }

        .text-pink {
            color: #d81b60;
            text-decoration: none;
            font-weight: 600;
        }

        .text-pink:hover {
            text-decoration: underline;
        }

        span[id$='-error'] {
            color: #d81b60;
            font-size: 0.875rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Form Booking Nail Art</h1>
        
        <form id="myForm" method="post" action="proses_form.php">
            <label for="name">Name : </label>
            <input type="text" id="name" name="name">
            <span id="name-error"></span>

            <label for="phone">Phone Number : </label>
            <input type="text" id="phone" name="phone">
            <span id="phone-error"></span>

            <label for="person">Person : </label>
            <input type="number" id="person" name="person">
            <span id="person-error"></span><br>

            <label for="type">Type : </label>
            <select name="type" id="type">
                <option value="">--Select--</option>
                <option value="gel">Gel Polish</option>
                <option value="extension">Extension</option>
                <option value="pedicure">Pedicure</option>
            </select>
            <span id="type-error"></span><br>

            <label for="remove">Remove old nail polish? : </label>
            <select name="remove" id="remove">
                <option value="">--Select--</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <span id="remove-error"></span><br>

            <label for="date">Choose Date:</label>
            <input type="date" id="date" name="date"><br>
            <span id="date-error"></span>

            <label for="time">Choose Time : </label>
            <select name="time" id="time">
                <option value="">--Select--</option>
                <option value="10:00">10:00</option>
                <option value="12:00">12:00</option>
                <option value="14:00">14:00</option>
                <option value="16:00">16:00</option>
            </select>      
            <span id="time-error"></span><br>
            <br>
            <input type="submit" value="Submit">
        </form>

        <div class="text-center">
            <a href="index.php" class="text-pink">← Back to Home</a>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $("#myForm").submit(function(event){
            event.preventDefault();
            
            var valid = true; 
            var name = $("#name").val();
            var phone = $("#phone").val();
            var person = $("#person").val();
            var type = $("#type").val();
            var remove = $("#remove").val();
            var date = $("#date").val();
            var time = $("#time").val();

            $("span[id$='-error']").text("");

            if (name === "") {
                $("#name-error").text("Please enter your name!");
                valid = false;
            }

            var phonePattern = /^[0-9]{10,12}$/;
            if (!phonePattern.test(phone)) {
                $("#phone-error").text("Please enter a valid phone number (10-12 digits)!");
                valid = false;
            }

            if (person === "" || person <= 0) {
                $("#person-error").text("Please enter a valid number of persons!");
                valid = false;
            }

            if (type === "") {
                $("#type-error").text("Please select a nail art type!");
                valid = false;
            }

            if (remove === "") {
                $("#remove-error").text("Please select an option for removal!");
                valid = false;
            }

            if (date === "") {
                $("#date-error").text("Please select a schedule!");
                valid = false;
            }

            if (time === "") {
                $("#time-error").text("Please select a time!");
                valid = false;
            }

            if (valid) {
                $.ajax({
                    url: 'proses_form.php',
                    type: 'POST',
                    data: $("#myForm").serialize(),
                    success: function (hasil) {
                        window.location.href = 'home.php';
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            }
        })
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>