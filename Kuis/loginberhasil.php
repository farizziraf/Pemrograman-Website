<?php
session_start();

// Pengecekan apakah pengguna sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Berhasil</title>
</head>
<body>
    <h3>Sistem Informasi Akademik Fasilkom UPN Jatim</h3>
    <p>Selamat datang, <?php echo $username; ?>!</p>
    <p><?php echo date('l, j F Y'); ?></p>
    <p><a href='index.php'>Kembali ke Form Login</a></p>
</body>
</html>