<?php
// Konfigurasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "kuis";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pengecekan apakah tombol Login ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Query untuk memeriksa kecocokan username dan password pada tabel users
    $sql = "SELECT * FROM users WHERE username='$username' AND email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: lupapasswordberhasil.php");
        exit;
    } else {
        echo "Username atau Email salah";
    }
}

$conn->close();
?>
