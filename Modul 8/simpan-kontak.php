<?php
include 'koneksi.php';
// Menyimpan data kedalam variabel
$nama = $_POST['nama'];
$jkel = $_POST['jenis_kelamin'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$pesan = $_POST['pesan'];

// Query SQL untuk insert data
$query = "INSERT INTO kontak (nama, jkel, email, alamat, kota, pesan) VALUES ('$nama', '$jkel', '$email', '$alamat', '$kota', '$pesan')";
mysqli_query($koneksi, $query);

// Mengalihkan ke halaman tampilkontak.php
header('location: tampilkontak.php');
?>
