<?php
session_start();
// Mendapatkan data pengguna dari sesi
$username = $_SESSION['username'];
$namalengkap = $_SESSION['namalengkap'];
$npm = $_SESSION['npm'];
$tempatlhr = $_SESSION['tempatlhr'];
$tanggallhr = $_SESSION['tanggallhr'];
$prodi = $_SESSION['prodi'];
$alamat = $_SESSION['alamat'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Berhasil</title>
</head>
<body>
	<h3>Registrasi Berhasil</h3>
	<p>Selamat, Anda telah berhasil terdaftar sebagai pengguna Sistem Informasi Akademik Fasilkom UPN Jatim. Berikut adalah detail registrasi Anda:</p>
	<table>
		<tr>
			<td>Username:</td>
			<td><?php echo $username; ?></td>
		</tr>
		<tr>
			<td>Nama Lengkap:</td>
			<td><?php echo $namalengkap; ?></td>
		</tr>
		<tr>
			<td>NPM:</td>
			<td><?php echo $npm; ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir:</td>
			<td><?php echo $tempatlhr; ?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir:</td>
			<td><?php echo $tanggallhr; ?></td>
		</tr>
		<tr>
			<td>Program Studi:</td>
			<td><?php echo $prodi; ?></td>
		</tr>
		<tr>
			<td>Alamat:</td>
			<td><?php echo $alamat; ?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?php echo $email; ?></td>
		</tr>
	</table>
    <p><a href='index.php'>Kembali ke Form Login</a></p>
</body>
</html>
