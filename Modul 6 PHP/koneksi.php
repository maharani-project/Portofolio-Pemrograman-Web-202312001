<?php
$conn = new mysqli("localhost", "root", "denpasar", "db_toko");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>