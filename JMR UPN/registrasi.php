<?php
// Koneksi ke database
require_once 'koneksi.php';

// Mendapatkan ID pendaftaran berikutnya
$sql = "SELECT MAX(user_id) AS max_id FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];
$next_id = $max_id + 1;

// Membuat ID pendaftaran dengan format P00001, P00002, dst.
$id_pendaftaran = '2301' . str_pad($next_id, 6, '0', STR_PAD_LEFT);

// Memproses data saat form pendaftaran dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];

    $password_confirm = $_POST['password_confirm'];

    // Memeriksa apakah password dan konfirmasi password sesuai
    if ($password === $password_confirm) {
        // Hash password sebelum menyimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Menyimpan informasi pendaftaran ke dalam database
        $sql = "INSERT INTO users (id_pendaftaran, nama, password, nomor_telepon, email) VALUES ('$id_pendaftaran', '$nama', '$hashed_password', '$nomor_telepon', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Pendaftaran berhasil! Username Akun Anda: $id_pendaftaran');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Password dan konfirmasi password tidak sesuai.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">

    <title>Register Form</title>
    <link rel="icon" type="image/x-icon" href="Assets/Foto/logo_upn.png">
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="nama" value="<?php echo isset($nama) ? $nama : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Nomor Telepon" name="nomor_telepon" value="<?php echo isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="password_confirm" id="password_confirm" value="<?php echo isset($_POST['password_confirm']) ? $_POST['password_confirm'] : ''; ?>" required>
            </div>
            <label for="show_password" class="checkbox-label">
                <input type="checkbox" onclick="showHidePassword()" id="show_password" class="show-password">
                Tampilkan Password
            </label>

            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="login.php">Login Here</a></p>
        </form>
    </div>
</body>

</html>

<script>
    function showHidePassword() {
        var passwordField = document.getElementById("password");
        var passwordConfirmField = document.getElementById("password_confirm");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordConfirmField.type = "text";
        } else {
            passwordField.type = "password";
            passwordConfirmField.type = "password";
        }
    }
</script>