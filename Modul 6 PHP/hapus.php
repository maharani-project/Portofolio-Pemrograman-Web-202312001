<?php
include 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM produk WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
