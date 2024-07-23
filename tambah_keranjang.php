<?php
session_start(); // Memulai sesi PHP
include 'config.php'; // Mengimpor file konfigurasi database

// Mendapatkan ID produk dari URL atau form
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($product_id > 0) {
    // Mengambil data produk dari database
    $sql = "SELECT * FROM produk WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Menambahkan produk ke keranjang
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = [
                'quantity' => 1,
                'harga' => $product['harga_1_box_isi_10pcs']
            ]; // Menambahkan produk pertama kali
        } else {
            $_SESSION['cart'][$product_id]['quantity']++; // Menambahkan jumlah produk
        }

        // Menghitung jumlah item dalam keranjang
        $_SESSION['cart_count'] = array_sum(array_column($_SESSION['cart'], 'quantity'));
    }
}

// Redirect kembali ke halaman produk
header("Location: produk.php");
exit();
?>
