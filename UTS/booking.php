<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Booking</title>
  <link rel="stylesheet" href="style1.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <h1>Form Booking Nail Art</h1>
  </header>

  <div class="container">
    <form id="myForm" method="post" action="proses_form.php" novalidate>
      <label for="name">Name : </label>
      <input type="text" id="name" name="name" autocomplete="name">
      <span id="name-error" style="color:red;"></span>

      <label for="phone">Phone Number : </label>
      <input type="text" id="phone" name="phone" inputmode="numeric" autocomplete="tel">
      <span id="phone-error" style="color:red;"></span>

      <label for="person">Person : </label>
      <input type="number" id="person" name="person" min="1">
      <span id="person-error" style="color:red;"></span><br>

      <label for="type">Type : </label>
      <select name="type" id="type">
        <option value="">--Select--</option>
        <option value="gel">Gel Polish</option>
        <option value="extension">Extension</option>
        <option value="pedicure">Pedicure</option>
      </select>
      <span id="type-error" style="color:red;"></span><br>

      <label for="remove">Remove old nail polish? : </label>
      <select name="remove" id="remove">
        <option value="">--Select--</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
      <span id="remove-error" style="color:red;"></span><br>

      <label for="date">Choose Date:</label>
      <input type="date" id="date" name="date"><br>

      <label for="time">Choose Time : </label>
      <select name="time" id="time">
        <option value="">--Select--</option>
        <option value="10:00">10:00</option>
        <option value="12:00">12:00</option>
        <option value="14:00">14:00</option>
        <option value="16:00">16:00</option>
      </select>
      <span id="time-error" style="color:red;"></span><br><br>

      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
