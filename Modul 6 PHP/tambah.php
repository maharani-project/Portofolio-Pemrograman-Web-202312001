<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Form Tambah Produk</h2>
    <form method="post">
        Nama Produk: <input type="text" name="nama" required><br><br>
        Harga: <input type="number" name="harga" required><br><br>
        Stok: <input type="number" name="stok" required><br><br>
        <input type="submit" name="simpan" value="Simpan">
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok  = $_POST['stok'];

        $sql = "INSERT INTO produk (nama, harga, stok) VALUES ('$nama', $harga, $stok)";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
