<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #0066cc;
            color: white;
            padding: 20px;
            text-align: center;
        }
        main {
            max-width: 600px;
            margin: 30px auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #0066cc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #004a99;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .success {
            margin-top: 20px;
            padding: 10px;
            background-color: #e0f7e9;
            border-left: 5px solid #28a745;
        }
    </style>
</head>
<body>

<header>
    <h1>Buku Tamu Digital STITEK Bontang</h1>
</header>

<main>
    <?php
    // Inisialisasi variabel
    $nama = $email = $pesan = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil dan bersihkan input
        $nama  = htmlspecialchars(trim($_POST["nama"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $pesan = htmlspecialchars(trim($_POST["pesan"]));

        // Validasi sederhana
        if (empty($nama) || empty($email) || empty($pesan)) {
            $error = "Semua kolom wajib diisi!";
        } else {
            // Semua data valid
            echo "<div class='success'>
                    <h3>Terima kasih atas pesan Anda!</h3>
                    <p><strong>Nama:</strong> $nama</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Pesan:</strong><br>" . nl2br($pesan) . "</p>
                </div>";
        }
    }
    ?>

    <!-- Form Buku Tamu -->
    <form method="post" action="">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama) ?>">

        <label for="email">Alamat Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">

        <label for="pesan">Pesan/Komentar:</label>
        <textarea id="pesan" name="pesan" rows="5"><?= htmlspecialchars($pesan) ?></textarea>

        <input type="submit" value="Kirim Pesan">
        <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
    </form>
</main>

</body>
</html>
