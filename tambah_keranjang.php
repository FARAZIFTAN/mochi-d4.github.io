<?php
session_start(); // Memulai sesi PHP
include 'config.php'; // Mengimpor file konfigurasi database

// Mendapatkan ID produk dari URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($product_id > 0) {
    // Menambahkan produk ke keranjang
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 1; // Menambahkan produk pertama kali
    } else {
        $_SESSION['cart'][$product_id]++; // Menambahkan jumlah produk
    }

    // Menghitung jumlah item dalam keranjang
    $_SESSION['cart_count'] = array_sum($_SESSION['cart']);
}

// Redirect kembali ke halaman produk
header("Location: produk.php");
exit();
