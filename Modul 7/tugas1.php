<?php
// konfigurasi database
$host = "localhost"; // sesuaikan dengan host database Anda
$username = "root"; // sesuaikan dengan username database Anda
$password = ""; // sesuaikan dengan password database Anda
$dbname = "myDB"; // sesuaikan dengan nama database Anda

// membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $dbname);

// membuat tabel buku_tamu
$query = "CREATE TABLE buku_tamu (
    ID_BT INT(10) PRIMARY KEY,
    NAMA VARCHAR(200),
    EMAIL VARCHAR(50),
    ISI TEXT)";

// mengeksekusi query pembuatan tabel buku_tamu
if (mysqli_query($koneksi, $query)) {
    echo "Tabel buku_tamu berhasil dibuat.";
} else {
    echo "Error creating table: " . mysqli_error($koneksi);
}

// menutup koneksi database
mysqli_close($koneksi);
?>
