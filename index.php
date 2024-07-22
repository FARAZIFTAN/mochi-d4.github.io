<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Temukan berbagai produk mochi menarik di Website Mochi. Tawaran spesial hanya untuk Anda.">
  <title>Website Mochi</title>
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Montserrat:wght@400;600&family=Lobster&display=swap">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="nav-container">
      <div class="nav-logo">
        <img src="img/logo.png" alt="Logo">
      </div>
      <div class="nav-links" id="nav-links">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="produk.php">Product</a></li>
          <li><a href="about.html">About</a></li>
        </ul>
      </div>
      <div class="nav-actions">
        <a href="keranjang.php" class="cart-btn">
          <i class="fas fa-shopping-cart"></i>
          <span class="cart-count">
            <?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0; ?>
          </span>
        </a>
        <a href="proses_logout.php" class="logout-btn">
          <i class="fas fa-sign-out-alt"></i>
        </a>
        <button class="hamburger" id="hamburger">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Selamat Datang di Website Mochi!</h1>
      <p>Temukan berbagai produk menarik dan tawaran spesial hanya untuk Anda.</p>
      <a href="produk.php" class="btn-primary">Lihat Produk</a>
    </div>
  </section>

  <!-- Testimonial Section -->
  <section class="testimonials">
    <h2>Apa Kata Pelanggan Kami?</h2>
    <div class="testimonial-slider">
      <div class="testimonial-item">
        <p>"Produk mochi ini luar biasa! Rasanya sangat enak dan kualitasnya sangat baik. Saya pasti akan membeli lagi!"</p>
        <h3>- Anna S.</h3>
      </div>
      <div class="testimonial-item">
        <p>"Layanan pelanggan yang hebat dan produk yang selalu memuaskan. Highly recommended!"</p>
        <h3>- John D.</h3>
      </div>
      <div class="testimonial-item">
        <p>"Kualitas mochi yang sangat tinggi dan rasa yang tidak tertandingi. Pengalaman belanja yang menyenangkan!"</p>
        <h3>- Lisa M.</h3>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <p>&copy; 2024 Website Mochi. Semua hak cipta dilindungi.</p>
    </div>
  </footer>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>