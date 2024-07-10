<?php
session_start(); // Memulai session untuk menyimpan data login

include "config.php"; // Menghubungkan ke file konfigurasi database

// Mendapatkan data dari form login
$username = $_POST['username']; // Mengambil nilai username dari form
$password = $_POST['password']; // Mengambil nilai password dari form

// Melakukan query untuk memeriksa apakah username cocok
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$cek = mysqli_num_rows($query); // Menghitung jumlah baris hasil query

// Jika ada data yang cocok, masukkan ke dalam session
if ($cek > 0) {
    $data = mysqli_fetch_assoc($query); // Mengambil data hasil query ke dalam array asosiatif
    $db_pass = $data['password']; // Mengambil password dari database

    // Memeriksa apakah password yang dimasukkan sesuai dengan yang dihash di database
    if (password_verify($password, $db_pass)) {
        // Cek jika user login sebagai admin
        if ($data['role'] == "admin") {
            $_SESSION['username'] = $username; // Menyimpan username ke dalam session
            $_SESSION['role'] = "admin"; // Menyimpan peran user ke dalam session
            header("location:admin.php"); // Redirect ke halaman admin jika login sebagai admin
            exit();
        }
        // Cek jika user login sebagai user
        else if ($data['role'] == "user") {
            $_SESSION['username'] = $username; // Menyimpan username ke dalam session
            $_SESSION['role'] = "user"; // Menyimpan peran user ke dalam session
            header("location:produk.php"); // Redirect ke halaman produk jika login sebagai user
            exit();
        }
    } else {
        // Alert jika username atau password salah, redirect kembali ke halaman login
        echo "<script>alert('Username atau password salah'); window.location.href='login.php';</script>";
    }
} else {
    // Alert jika username tidak ditemukan, redirect kembali ke halaman login
    echo "<script>alert('Username atau password salah'); window.location.href='login.php';</script>";
}

// Tutup koneksi database
mysqli_close($conn);
?>
