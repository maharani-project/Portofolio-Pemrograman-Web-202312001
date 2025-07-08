<?php 
include 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM produk WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h2>Form Edit Produk</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Nama Produk: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>
        Harga: <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required><br><br>
        Stok: <input type="number" name="stok" value="<?php echo $row['stok']; ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>

    <?php
    if (isset($_POST['update'])) {
        $id    = $_POST['id'];
        $nama  = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok  = $_POST['stok'];

        $sql = "UPDATE produk SET nama='$nama', harga=$harga, stok=$stok WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>
</body>
</html>
