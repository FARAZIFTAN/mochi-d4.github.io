<?php
session_start();

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo "Error: ID produk tidak valid.";
    exit;
}

$product_id = (int)$_POST['id'];

if (isset($_SESSION['cart'][$product_id])) {
    unset($_SESSION['cart'][$product_id]);
}

$_SESSION['cart_count'] = array_sum($_SESSION['cart']); // Mengupdate jumlah total produk di keranjang

header("Location: keranjang.php");
exit;
?>
