<?php
session_start();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Error: ID produk tidak valid.";
    exit;
}

$product_id = (int)$_GET['id'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] = 0;
}

$_SESSION['cart'][$product_id]++;

$_SESSION['cart_count'] = array_sum($_SESSION['cart']); // Mengupdate jumlah total produk di keranjang

header("Location: produk.php");
exit;
?>
