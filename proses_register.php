<?php 
include 'config.php'; // Menghubungkan ke file konfigurasi database

// Mendapatkan data dari form register
$username = $_POST['username']; // Mengambil nilai username dari form
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mengamankan password dengan fungsi hash bawaan PHP

// Melakukan query untuk memasukkan data ke database
$query = mysqli_query($conn, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')");

// Memeriksa apakah query berhasil dieksekusi
if ($query) {
    header("location:produk.php"); // Redirect ke halaman produk jika registrasi berhasil
} else {
    echo "Data gagal ditambahkan: " . mysqli_error($conn); // Menampilkan pesan jika terjadi kesalahan saat menambah data
}

// Tutup koneksi database
mysqli_close($conn);
?>
