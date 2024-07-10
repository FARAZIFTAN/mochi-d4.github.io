<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to select product based on ID
    $sql = "SELECT * FROM produk WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
} else {
    echo "ID produk tidak diberikan.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST['nama_produk'];
    $harga_1_box_isi_10pcs = $_POST['harga_1_box_isi_10pcs'];
    $deskripsi = $_POST['deskripsi'];
    // $gambar = $_POST['gambar'];

    // Query to update product
    $sql = "UPDATE produk SET nama_produk='$nama_produk', harga_1_box_isi_10pcs=$harga_1_box_isi_10pcs, deskripsi='$deskripsi' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Produk berhasil diperbarui.";
        header("Location: product.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Edit Produk</h1>
                                    </div>
                                    <form class="user" method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id"; ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nama_produk" value="<?php echo $row['nama_produk']; ?>" placeholder="Nama Produk">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" name="harga_1_box_isi_10pcs" value="<?php echo $row['harga_1_box_isi_10pcs']; ?>" placeholder="Harga per 10 Pcs">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control form-control-user" name="deskripsi" placeholder="Deskripsi"><?php echo $row['deskripsi']; ?></textarea>
                                        </div>
                                        <!-- <div class="form-group">
                                            <input type="file" class="form-control-file" name="gambar">
                                        </div> -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Update Produk
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="product.php">Kembali ke daftar produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
