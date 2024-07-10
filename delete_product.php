<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus produk
    $delete_query = "DELETE FROM produk WHERE id='$id'";

    if ($conn->query($delete_query) === TRUE) {
        // Redirect kembali ke halaman produk setelah penghapusan
        header("Location: product.php");
        exit();
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
}
?>
