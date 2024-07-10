<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Deklarasi tipe dokumen HTML5 -->
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding untuk dokumen ini -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan untuk responsive design -->
    <title>Login</title> <!-- Judul halaman yang akan ditampilkan pada tab browser -->
    <link rel="stylesheet" href="CSS/style_login.css"> <!-- Menyertakan file CSS untuk styling, ganti dengan path CSS Anda -->
</head>

<body>
    <!-- Kontainer utama untuk form login -->
    <div class="login-container">
        <h2>Login</h2> <!-- Judul untuk form login -->
        <!-- Form untuk login, mengirimkan data ke proses_login.php dengan metode POST -->
        <form action="proses_login.php" method="POST">
            <!-- Grup form untuk input username -->
            <div class="form-group">
                <label for="username">Username:</label> <!-- Label untuk input username -->
                <input type="text" id="username" name="username" required> <!-- Input teks untuk username, wajib diisi -->
            </div>
            <!-- Grup form untuk input password -->
            <div class="form-group">
                <label for="password">Password:</label> <!-- Label untuk input password -->
                <input type="password" id="password" name="password" required> <!-- Input password, wajib diisi -->
            </div>
            <button type="submit">Login</button> <!-- Tombol untuk mengirim form -->
        </form>
        <!-- Link untuk menuju halaman registrasi jika belum punya akun -->
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>

</html>
