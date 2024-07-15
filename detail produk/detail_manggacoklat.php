<?php
// Database connection
$servername = "localhost"; // Nama server database
$username = "root"; // Username untuk mengakses database
$password = ""; // Password untuk mengakses database
$dbname = "promosi"; // Nama database yang digunakan

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // Membuat koneksi ke database menggunakan mysqli

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Menampilkan pesan kesalahan jika koneksi gagal
}

// Retrieve product data from database using prepared statement
$product_id = 3; // ID produk yang ingin ditampilkan
$sql = "SELECT * FROM produk WHERE id = ?"; // Query SQL untuk mengambil data produk berdasarkan ID
$stmt = $conn->prepare($sql); // Persiapan statement SQL
$stmt->bind_param("i", $product_id); // Binding parameter ID produk ke statement
$stmt->execute(); // Menjalankan query
$result = $stmt->get_result(); // Mendapatkan hasil query dalam bentuk objek result set

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc(); // Mengambil data produk ke dalam bentuk array asosiatif
} else {
    echo "Produk tidak ditemukan."; // Menampilkan pesan jika produk tidak ditemukan
    exit(); // Menghentikan eksekusi script selanjutnya jika produk tidak ditemukan
}

$conn->close(); // Menutup koneksi database setelah selesai mengambil data produk
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="css/style_detail.css"> <!-- Memuat file CSS untuk tata letak -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> <!-- Memuat jenis font Poppins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Memuat ikon Font Awesome -->
</head>

<body>
    <div class="product-container">
        <div class="product-image">
            <img src="<?php echo htmlspecialchars($product['gambar']); ?>" alt=""> <!-- Menampilkan gambar produk -->
        </div>
        <div class="product-details">
            <h1 class="product-title"><?php echo htmlspecialchars($product['nama_produk']); ?></h1> <!-- Menampilkan nama produk -->
            <p class="product-price">Rp <?php echo number_format($product['harga_1_box_isi_10pcs'], 0, ',', '.'); ?> Per Box</p> <!-- Menampilkan harga produk -->
            <p class="product-description">
                <?php echo htmlspecialchars($product['deskripsi']); ?> <!-- Menampilkan deskripsi produk -->
            </p>
            <div class="product-actions">
                <form action="checkout.php" method="post" id="checkout-form">
                    <input type="number" value="1" min="1" step="1" class="quantity" name="quantity" id="quantity" onchange="updateTotalPrice()"> <!-- Input jumlah barang -->
                    <p id="total-price">Total Harga: Rp <?php echo number_format($product['harga_1_box_isi_10pcs'], 0, ',', '.'); ?></p> <!-- Menampilkan total harga berdasarkan jumlah barang -->
                    <input type="hidden" name="harga_1_box_isi_10pcs" value="<?php echo $product['harga_1_box_isi_10pcs']; ?>"> <!-- Input harga produk untuk dikirim ke checkout -->
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>"> <!-- Input ID produk untuk dikirim ke checkout -->
                    <button type="button" class="add-to-cart" onclick="confirmCheckout()">Pesan Sekarang</button> <!-- Tombol untuk memulai checkout -->
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateTotalPrice() {
            const quantity = document.getElementById('quantity').value; // Mendapatkan nilai jumlah barang
            const pricePerSet = <?php echo $product['harga_1_box_isi_10pcs']; ?>; // Mendapatkan harga per box dari PHP
            const totalPrice = quantity * pricePerSet; // Menghitung total harga berdasarkan jumlah barang
            document.getElementById('total-price').innerText = 'Total Harga: Rp ' + totalPrice.toLocaleString('id-ID'); // Menampilkan total harga dengan format mata uang Indonesia
        }

        function confirmCheckout() {
            const confirmation = confirm('Apakah Anda yakin ingin melanjutkan ke halaman checkout?'); // Konfirmasi sebelum checkout
            if (confirmation) {
                document.getElementById('checkout-form').submit(); // Kirim form checkout jika dikonfirmasi
            } else {
                // Tetap di halaman detail produk jika tidak dikonfirmasi
            }
        }
    </script>
</body>

</html>