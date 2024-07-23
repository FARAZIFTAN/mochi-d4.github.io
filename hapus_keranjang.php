<?php
session_start(); // Memulai sesi PHP

// Memastikan id produk diberikan
if (isset($_POST['id'])) {
    $product_id = $_POST['id'];

    // Menghapus produk dari keranjang
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }

    // Menghitung ulang jumlah item dalam keranjang
    $_SESSION['cart_count'] = array_sum($_SESSION['cart']);

    // Jika keranjang kosong, set jumlah item ke 0
    if (empty($_SESSION['cart'])) {
        $_SESSION['cart_count'] = 0;
    }
}

// Redirect kembali ke halaman keranjang
header("Location: keranjang.php");
exit();
?>
