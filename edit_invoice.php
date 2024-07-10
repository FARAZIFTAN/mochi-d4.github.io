<?php
include 'config.php';

// Get the invoice ID from the URL
$id = $_GET['id'];

// Fetch invoice data based on the ID
$sql = "SELECT * FROM pesanan WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat_pengiriman = $_POST['alamat_pengiriman'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];
    $jumlah_produk = $_POST['jumlah_produk'];
    $total_harga = $_POST['total_harga'];
    $tanggal_pesanan = $_POST['tanggal_pesanan'];

    // Update invoice data
    $update_sql = "UPDATE pesanan SET nama_lengkap=?, alamat_pengiriman=?, nomor_telepon=?, email=?, jumlah_produk=?, total_harga=?, tanggal_pesanan=? WHERE id=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssssdsi", $nama_lengkap, $alamat_pengiriman, $nomor_telepon, $email, $jumlah_produk, $total_harga, $tanggal_pesanan, $id);

    if ($update_stmt->execute()) {
        header("Location: invoice.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Invoice</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Invoice</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat_pengiriman">Alamat Pengiriman:</label>
                <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" value="<?php echo $row['alamat_pengiriman']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon:</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah_produk">Jumlah Produk:</label>
                <input type="number" class="form-control" id="jumlah_produk" name="jumlah_produk" value="<?php echo $row['jumlah_produk']; ?>" required>
            </div>
            <div class="form-group">
                <label for="total_harga">Total Harga:</label>
                <input type="number" class="form-control" id="total_harga" name="total_harga" value="<?php echo $row['total_harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pesanan">Tanggal Pesanan:</label>
                <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" value="<?php echo $row['tanggal_pesanan']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="invoice.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
