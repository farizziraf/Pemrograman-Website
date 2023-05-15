<?php
session_start();

// Pengecekan apakah tombol Register ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $namalengkap = $_POST['namalengkap'];
    $npm = $_POST['npm'];
    $tempatlhr = $_POST['tempatlhr'];
    $tanggallhr = $_POST['tanggallhr'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    // Konfigurasi koneksi ke database
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $database = "kuis";

    // Membuat koneksi
    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk memasukkan data registrasi ke dalam tabel users
    $sql = "INSERT INTO users (username, password, namalengkap, npm, tempatlhr, tanggallhr, prodi, alamat, email)
            VALUES ('$username', '$password', '$namalengkap', '$npm', '$tempatlhr', '$tanggallhr', '$prodi', '$alamat', '$email')";

    if ($conn->query($sql) === TRUE) {
        // Simpan data registrasi ke dalam sesi
        $_SESSION['username'] = $username;
        $_SESSION['namalengkap'] = $namalengkap;
        $_SESSION['npm'] = $npm;
        $_SESSION['tempatlhr'] = $tempatlhr;
        $_SESSION['tanggallhr'] = $tanggallhr;
        $_SESSION['prodi'] = $prodi;
        $_SESSION['alamat'] = $alamat;
        $_SESSION['email'] = $email;

        // Redirect ke halaman registrasi berhasil
        header("Location: registrasiberhasil.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
