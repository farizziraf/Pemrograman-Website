<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password Berhasil</title>
</head>
<body>
    <?php
    $email = ""; // Inisialisasi variabel email

    // Memeriksa apakah ada email yang dikirim melalui metode GET
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }

    // Menampilkan teks dengan email yang berhasil dikirimkan
    echo "Tautan reset password telah dikirim ke email " . $email;
    ?>
    <p><a href='index.php'>Kembali ke Form Login</a></p>
</body>
</html>
