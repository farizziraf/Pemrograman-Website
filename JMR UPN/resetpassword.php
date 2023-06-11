<?php
// Koneksi ke database
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];

    // Periksa apakah email sesuai dengan saat registrasi akun
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "Email tidak valid.";
        exit();
    }

    // Update password baru
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql_update = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
    mysqli_query($conn, $sql_update);

    // Redirect pengguna ke halaman sukses/reset password berhasil direset
    header("Location: login.php");
    exit();
}
?>

<h2>Reset Password</h2>
<form method="post" action="">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="new_password">Password Baru:</label>
    <input type="password" name="new_password" id="password" required>
    <br>
    <input type="checkbox" onclick="showHidePassword()"> Show Password
    <br>
    <input type="submit" value="Reset Password">
</form>

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
