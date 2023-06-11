<?php
// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'jalurmandiri');
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
