<?php
require_once 'koneksi.php';

// Hash password admin
$password_admin = password_hash('admin', PASSWORD_DEFAULT);

// Memasukkan data admin ke tabel admin
$sql = "INSERT INTO admin (username, password) VALUES ('admin', '$password_admin')";
if (mysqli_query($conn, $sql)) {
    echo "Data admin berhasil dimasukkan.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>