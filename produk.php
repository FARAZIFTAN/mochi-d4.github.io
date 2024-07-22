<?php
include 'config.php'; // Mengimpor file konfigurasi database
session_start(); // Memulai sesi PHP

$sql = "SELECT * FROM produk"; // Query SQL untuk mengambil semua data produk dari tabel 'produk'
$result = $conn->query($sql); // Eksekusi query dan menyimpan hasilnya dalam variabel $result
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produk - Website Mochi</title>
    <link rel="stylesheet" href="CSS/style_produk.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="nav-logo">
                <img src="img/logo.png" class="logo" alt="Logo" />
            </a>
            <div class="nav-links" id="nav-links">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="produk.php">Product</a></li>
                    <li><a href="about.html">About</a></li>
                </ul>
            </div>
            <div class="nav-actions">
                <a href="keranjang.php" class="cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">
                        <?php
                        // Assuming you have a session variable that stores the cart count
                        echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
                        ?>
                    </span>
                </a>
                <a href="proses_logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <?php
                    if (!isset($_SESSION['username'])) { // Memeriksa apakah variabel sesi 'username' tidak diset
                        header("Location: login.php"); // Redirect ke halaman login jika tidak
                        exit(); // Keluar dari skrip PHP setelah redirect
                    }
                    ?>
                </a>
                <button class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Product Grid -->
        <div class="product-container">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="product-card">
                    <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_produk']; ?>">
                    <div class="product-info">
                        <h2><?php echo $row['nama_produk']; ?></h2>
                        <a href="detail_produk/<?php echo $row['detail_halaman']; ?>.php?id=<?php echo $row['id']; ?>" class="btn">Detail Produk</a>
                        <a href="tambah_keranjang.php?id=<?php echo $row['id']; ?>" class="btn">Tambah ke Keranjang</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="prev">Previous</a>
            <a href="#" class="page">1</a>
            <a href="#" class="page">2</a>
            <a href="#" class="page">3</a>
            <a href="#" class="next">Next</a>
        </div>

        <!-- Loading Spinner -->
        <div id="loading-spinner" class="loading-spinner">
            <div class="spinner"></div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Toko Online. Hak cipta dilindungi.</p>
    </footer>

    <script>
        // JavaScript for Navbar Toggle
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('show');
        });

        // JavaScript for Scroll Effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // JavaScript for Loading Spinner (Simulating Data Loading)
        window.addEventListener('load', () => {
            const loadingSpinner = document.getElementById('loading-spinner');
            loadingSpinner.style.display = 'none'; // Hide spinner when page is loaded
        });

        // Show loading spinner while fetching data (useful for dynamic data loading)
        document.addEventListener('DOMContentLoaded', () => {
            const loadingSpinner = document.getElementById('loading-spinner');
            loadingSpinner.style.display = 'block'; // Show spinner when data is being loaded

            // Simulate data fetching with a timeout
            setTimeout(() => {
                loadingSpinner.style.display = 'none'; // Hide spinner after data is loaded
            }, 2000); // Adjust timeout as needed
        });
    </script>
</body>

</html>