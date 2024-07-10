<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/style_pesanan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="checkout-container">
        <h1>Checkout</h1>
        <?php
        // Mendapatkan nilai quantity dan harga per set dari POST
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        $pricePerSet = isset($_POST['harga_1_box_isi_10pcs']) ? (int)$_POST['harga_1_box_isi_10pcs'] : 30000;
        $totalPrice = $quantity * $pricePerSet;
        ?>
        <form action="proses_checkout.php" method="post">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat Pengiriman</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" min="1" step="1" required onchange="updateTotalPrice()">
            </div>
            <p id="total-price">Total Harga: Rp <?php echo number_format($totalPrice, 0, ',', '.'); ?></p>
            <!-- Input hidden untuk mengirimkan harga per set -->
            <input type="hidden" name="harga_1_box_isi_10pcs" value="<?php echo $pricePerSet; ?>">
            <!-- Input hidden untuk mengirimkan product_id -->
            <input type="hidden" name="product_id" value="<?php echo isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : ''; ?>">

            <button type="submit" class="submit-order">Konfirmasi Pemesanan</button>
        </form>
    </div>

    <script>
        function updateTotalPrice() {
            const quantity = document.getElementById('quantity').value;
            const pricePerSet = <?php echo $pricePerSet; ?>;
            const totalPrice = quantity * pricePerSet;
            document.getElementById('total-price').innerText = 'Total Harga: Rp ' + totalPrice.toLocaleString('id-ID');
        }
    </script>

</body>

</html>
