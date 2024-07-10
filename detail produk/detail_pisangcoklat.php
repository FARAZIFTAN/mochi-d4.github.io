<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "promosi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve product data from database using prepared statement
$product_id = 14; // ID produk yang ingin ditampilkan
$sql = "SELECT * FROM produk WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Produk tidak ditemukan.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="css/style_detail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="product-container">
        <div class="product-image">
            <img src="<?php echo htmlspecialchars($product['gambar']); ?>" alt="">
        </div>
        <div class="product-details">
            <h1 class="product-title"><?php echo htmlspecialchars($product['nama_produk']); ?></h1>
            <p class="product-price">Rp <?php echo number_format($product['harga_1_box_isi_10pcs'], 0, ',', '.'); ?> Per Box</p>
            <p class="product-description">
                <?php echo htmlspecialchars($product['deskripsi']); ?>
            </p>
            <div class="product-actions">
                <form action="checkout.php" method="post" id="checkout-form">
                    <input type="number" value="1" min="1" step="1" class="quantity" name="quantity" id="quantity" onchange="updateTotalPrice()">
                    <p id="total-price">Total Harga: Rp <?php echo number_format($product['harga_1_box_isi_10pcs'], 0, ',', '.'); ?></p>
                    <input type="hidden" name="harga_1_box_isi_10pcs" value="<?php echo $product['harga_1_box_isi_10pcs']; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="button" class="add-to-cart" onclick="confirmCheckout()">Pesan Sekarang</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateTotalPrice() {
            const quantity = document.getElementById('quantity').value;
            const pricePerSet = <?php echo $product['harga_1_box_isi_10pcs']; ?>;
            const totalPrice = quantity * pricePerSet;
            document.getElementById('total-price').innerText = 'Total Harga: Rp ' + totalPrice.toLocaleString('id-ID');
        }

        function confirmCheckout() {
            const confirmation = confirm('Apakah Anda yakin ingin melanjutkan ke halaman checkout?');
            if (confirmation) {
                document.getElementById('checkout-form').submit();
            } else {
                // Tetap di halaman detail produk
            }
        }
    </script>
</body>

</html>
