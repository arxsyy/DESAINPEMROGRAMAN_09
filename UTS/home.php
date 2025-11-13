<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nailash Studio — Home</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #fff5f8;
      color: #333;
    }
    header, nav, section, footer {
      padding: 20px;
      text-align: center;
    }
    nav {
      background: #fff;
      border-bottom: 1px solid #f1c5d6;
    }
    nav a {
      text-decoration: none;
      color: #d64b7f;
      margin: 0 10px;
      font-weight: bold;
    }
    nav a:hover {
      text-decoration: underline;
    }
    h1, h2 {
      color: #d64b7f;
    }
    .btn {
      display: inline-block;
      padding: 8px 14px;
      border-radius: 6px;
      text-decoration: none;
      color: white;
      background: #ff7aa2;
      margin: 5px;
    }
    .btn-outline {
      background: white;
      border: 1px solid #ff7aa2;
      color: #ff7aa2;
    }
    .grid {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 10px;
    }
    .card {
      background: white;
      border: 1px solid #f1c5d6;
      border-radius: 8px;
      padding: 10px;
      width: 150px;
    }
    .gallery img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 6px;
    }
    footer {
      border-top: 1px solid #f1c5d6;
      color: #888;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <nav>
    <a href="#">Nailash Studio</a>
    <a href="#services">Services</a>
    <a href="#pricing">Pricing</a>
    <a href="#gallery">Gallery</a>
    <a href="#contact">Contact</a>
    <a href="login.php">Admin Login</a>
  </nav>

  <header>
    <h1>Terima kasih! Booking kamu sudah masuk 💅</h1>
    <p>Detail pesanan telah dikirim ke email/WhatsApp kamu.</p>
    <a href="booking.php" class="btn">Booking Lagi</a>
  </header>

  <section id="services">
    <h2>Services</h2>
    <div class="grid">
      <div class="card">Gel Polish<br><small>60–90 min</small></div>
      <div class="card">Extension<br><small>90–120 min</small></div>
      <div class="card">Pedicure<br><small>45–60 min</small></div>
    </div>
  </section>

  <section id="pricing">
    <h2>Pricing</h2>
    <div class="grid">
      <div class="card">Gel Polish<br><strong>Rp120K</strong></div>
      <div class="card">Extension<br><strong>Rp230K</strong></div>
      <div class="card">Pedicure<br><strong>Rp90K</strong></div>
    </div>
  </section>

  <section id="gallery">
    <h2>Gallery</h2>
    <div class="grid gallery">
      <img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?q=80&w=300" alt="">
      <img src="https://images.unsplash.com/photo-1597687226795-9385c2374b56?q=80&w=300" alt="">
      <img src="https://images.unsplash.com/photo-1607779097040-26c05e9c5a7b?q=80&w=300" alt="">
      <img src="https://images.unsplash.com/photo-1601672453376-b8c3c2f21b3f?q=80&w=300" alt="">
    </div>
  </section>

  <section id="contact">
    <h2>Contact</h2>
    <p>Jl. Contoh No. 123, Malang<br>WA: 0812-3456-7890 • Open 10:00–18:00</p>
  </section>

  <footer>
    © <span id="y"></span> Nailash Studio — <a href="login.php">Admin Login</a>
  </footer>

  <script>
    document.getElementById('y').textContent = new Date().getFullYear();
  </script>

</body>
</html>
