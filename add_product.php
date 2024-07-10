<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga_per_10_pcs = $_POST['harga_per_10_pcs'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];

    // Query untuk insert produk baru
    $insert_query = "INSERT INTO produk (nama_produk, harga_per_10_pcs, deskripsi, gambar) VALUES ('$nama_produk', '$harga_per_10_pcs', '$deskripsi', '$gambar')";

    if ($conn->query($insert_query) === TRUE) {
        // Redirect untuk menghindari resubmission saat refresh
        header("Location: product.php");
        exit();
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
?>
