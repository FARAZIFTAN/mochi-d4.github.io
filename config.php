<?php
$servername = "localhost";  // atau bisa "127.0.0.1" jika localhost tidak bekerja
$username = "root";         // Sesuaikan dengan username database Anda
$password = "";             // Sesuaikan dengan password database Anda
$dbname = "promosi";  // Sesuaikan dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Atur charset ke utf8mb4 jika diperlukan
if (!$conn->set_charset("utf8mb4")) {
    printf("Error loading character set utf8mb4: %s\n", $conn->error);
    exit();
}
?>
