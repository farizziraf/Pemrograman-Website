<?php
// Koneksi ke database
require_once 'koneksi.php';

// Memproses data saat form login dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengecek kecocokan username dan password untuk admin
    $sql_admin = "SELECT * FROM admin WHERE username = '$username'";
    $result_admin = mysqli_query($conn, $sql_admin);
    $admin = mysqli_fetch_assoc($result_admin);

    // Mengecek kecocokan nama dan password untuk user
    $sql_user = "SELECT * FROM users WHERE id_pendaftaran = '$username'";
    $result_user = mysqli_query($conn, $sql_user);
    $user = mysqli_fetch_assoc($result_user);

    if ($admin && password_verify($password, $admin['password'])) {
        // Login berhasil untuk admin, arahkan ke halaman admin
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        echo "<script>alert('Admin Login Berhasil');</script>";
        echo "<script>window.location.href = 'admin.php';</script>";
        exit;
    } elseif ($user && password_verify($password, $user['password'])) {
        // Login berhasil untuk user, arahkan ke halaman user
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        echo "<script>alert('$username Login Berhasil');</script>";
        echo "<script>window.location.href = 'user.php';</script>";
        exit;
    } else {
        // Login gagal, tampilkan pesan kesalahan
        echo "<script>alert('Username dan Password salah!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="Assets/Foto/logo_upn.png">
    <title>Login Form</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo isset($nama) ? $nama : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" required>
            </div>
            <label for="show_password" class="checkbox-label">
                <input type="checkbox" onclick="showHidePassword()" id="show_password" class="show-password">
                Tampilkan Password
            </label>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Don't have an account? <a href="registrasi.php">Register Here</a></p>
        </form>
    </div>
</body>

</html>


<script>
    function showHidePassword() {
        var passwordField = document.getElementById("password");

        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>