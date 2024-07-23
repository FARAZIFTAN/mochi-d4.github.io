<?php
session_start();
include 'config.php';

// Mengambil produk dari keranjang
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Mengambil data produk dari database
$cart_items = [];
$total_harga = 0;
foreach ($cart as $product_id => $quantity) {
    $sql = "SELECT * FROM produk WHERE id = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $product['quantity'] = $quantity;
        $product['harga'] = isset($product['harga']) ? $product['harga'] : 0; // Check if 'harga' exists
        $product['subtotal'] = $product['harga'] * $quantity;
        $total_harga += $product['subtotal'];
        $cart_items[] = $product;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Website Mochi</title>
    <link rel="stylesheet" href="CSS/style_keranjang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="nav-logo">
                <img src="img/logo.png" class="logo" alt="Logo">
            </a>
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
        <div class="cart-container">
            <?php foreach ($cart_items as $item) : ?>
                <div class="cart-item">
                    <img src="<?php echo $item['gambar']; ?>" alt="<?php echo $item['nama_produk']; ?>">
                    <div class="cart-info">
                        <h2><?php echo $item['nama_produk']; ?></h2>
                        <p>Jumlah: <?php echo $item['quantity']; ?></p>
                        <p>Harga: Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></p>
                        <form action="hapus_keranjang.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                            <button type="submit" class="btn">Hapus</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="total-harga">
            Total Harga: Rp <?php echo number_format($total_harga, 0, ',', '.'); ?>
        </div>

        <a href="checkout.php" class="btn">Checkout</a>
    </main>

    <footer>
        <p>&copy; 2024 Toko Online. Hak cipta dilindungi.</p>
    </footer>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('show');
        });

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