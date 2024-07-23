<?php
include 'config.php'; // Mengimpor file konfigurasi database
session_start(); // Memulai sesi PHP

// Memeriksa apakah keranjang tidak kosong
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Mendapatkan detail produk dari database berdasarkan ID yang ada di keranjang
$product_ids = array_keys($cart);
if (!empty($product_ids)) {
    $ids = implode(',', array_map('intval', $product_ids));
    $sql = "SELECT * FROM produk WHERE id IN ($ids)";
    $result = $conn->query($sql);
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    $products = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keranjang - Website Mochi</title>
    <link rel="stylesheet" href="CSS/style_keranjang.css" />
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
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="nav-actions">
                <a href="keranjang.php" class="cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">
                        <?php
                        echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
                        ?>
                    </span>
                </a>
                <a href="proses_logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <?php
                    if (!isset($_SESSION['username'])) {
                        header("Location: login.php");
                        exit();
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
        <h1>Keranjang Belanja</h1>
        <?php if (!empty($products)) : ?>
            <div class="cart-container">
                <?php foreach ($products as $product) : ?>
                    <div class="cart-item">
                        <img src="<?php echo $product['gambar']; ?>" alt="<?php echo $product['nama_produk']; ?>">
                        <div class="cart-info">
                            <h2><?php echo $product['nama_produk']; ?></h2>
                            <p>Jumlah: <?php echo $cart[$product['id']]; ?></p>
                            <p>Harga: Rp <?php echo number_format($product['harga'], 0, ',', '.'); ?></p>
                            <a href="hapus_dari_keranjang.php?id=<?php echo $product['id']; ?>" class="btn">Hapus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="total-harga">
                <?php
                $total = 0;
                foreach ($products as $product) {
                    $total += $product['harga'] * $cart[$product['id']];
                }
                ?>
                <h2>Total Harga: Rp <?php echo number_format($total, 0, ',', '.'); ?></h2>
            </div>
            <a href="checkout.php" class="btn">Checkout</a>
        <?php else : ?>
            <p>Keranjang Anda kosong.</p>
        <?php endif; ?>
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
    </script>
</body>

</html>