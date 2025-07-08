<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td:last-child {
            text-align: center;
        }

        .action-links a {
            margin: 0 5px;
        }

        .add-button {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 12px;
            background-color: #28a745;
            color: white;
            border-radius: 4px;
        }

        .add-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h2>Daftar Produk</h2>
    <a href="tambah.php" class="add-button">Tambah Produk Baru</a>
    <br><br>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM produk";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['nama']}</td>";
                    echo "<td>{$row['harga']}</td>";
                    echo "<td>{$row['stok']}</td>";
                    echo "<td class='action-links'>
                            <a href='edit.php?id={$row['id']}'>Edit</a> |
                            <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
