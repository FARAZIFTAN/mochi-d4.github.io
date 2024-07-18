<?php
include 'config.php'; // Mengimpor file konfigurasi database

$sql = "SELECT * FROM produk"; // Query SQL untuk mengambil semua data produk dari tabel 'produk'
$result = $conn->query($sql); // Eksekusi query dan menyimpan hasilnya dalam variabel $result
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website Mochi</title>
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/style_produk.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <div class="hero">
        <nav class="navbar">
            <div class="nav-logo">
                <img src="img/logo.png" class="logo" />
            </div>
            <div class="nav-links" id="nav-links">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="produk.php">Product</a></li>
                    <li><a href="about.html">About</a></li>
                </ul>
            </div>
            <div class="nav-actions">
                <a href="proses_logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <button class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </button>
                <?php
                session_start();
                if (!isset($_SESSION['username'])) {
                    header("Location: login.php");
                    exit();
                }
                ?>
            </div>
        </nav>
        <main>
            <div class="product-container">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="product-card anim">
                        <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_produk']; ?>">
                        <h2><?php echo $row['nama_produk']; ?></h2>
                        <a href="detail produk/<?php echo $row['detail_halaman']; ?>.php?id=<?php echo $row['id']; ?>" class="btn anim">Beli Sekarang</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Toko Online. Hak cipta dilindungi.</p>
        </footer>
    </div>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('show');
        });
    </script>
</body>

</html>