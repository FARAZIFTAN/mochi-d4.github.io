<?php
include '../config.php'; // Sesuaikan path dengan struktur direktori yang benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form dengan validasi
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $address = isset($_POST['address']) ? htmlspecialchars(trim($_POST['address'])) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
    $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $total_price = isset($_POST['harga_1_box_isi_10pcs']) ? ($_POST['harga_1_box_isi_10pcs'] * $quantity) : 0;
    $order_date = date('Y-m-d');
    $kode_invoice = "INV-" . time();

    // Debugging: Tampilkan nilai product_id
    echo "Product ID: " . $product_id . "<br>";

    if ($product_id <= 0) {
        echo "Error: ID produk tidak valid.";
        exit;
    }

    // Query SQL untuk memeriksa apakah product_id ada di tabel produk
    $check_product_sql = "SELECT COUNT(*) AS count FROM produk WHERE id = ?";
    $stmt_check_product = $conn->prepare($check_product_sql);
    $stmt_check_product->bind_param("i", $product_id);
    $stmt_check_product->execute();
    $stmt_check_product->store_result();
    $stmt_check_product->bind_result($count);
    $stmt_check_product->fetch();
    $stmt_check_product->close();

    // Debugging: Tampilkan nilai count
    echo "Count of products found: " . $count . "<br>";

    if ($count == 0) {
        echo "Error: Produk dengan ID $product_id tidak ditemukan.";
        exit;
    }

    // Query SQL untuk memasukkan data ke tabel pesanan
    $sql = "INSERT INTO pesanan (nama_lengkap, alamat_pengiriman, nomor_telepon, email, jumlah_produk, total_harga, tanggal_pesanan, produk_id, kode_invoice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssddsss", $name, $address, $phone, $email, $quantity, $total_price, $order_date, $product_id, $kode_invoice);

    if ($stmt->execute()) {
        echo "Pesanan berhasil disimpan. Kode Invoice: " . htmlspecialchars($kode_invoice);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
