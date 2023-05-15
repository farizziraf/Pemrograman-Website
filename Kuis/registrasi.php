<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<p>Registrasi Sistem Informasi Akademik Fasilkom UPN Jatim</p>
	<form action="input.php" method="post">
		<label for="username">Username</label>
		<input type="text" id="username" name="username"><br>
		<label for="password">Password</label>
		<input type="password" id="password" name="password"><br>
		<label for="namalengkap">Nama Lengkap</label>
		<input type="text" id="namalengkap" name="namalengkap"><br>
		<label for="npm">NPM</label>
		<input type="text" id="npm" name="npm"><br>
		<label for="tempatlhr">Tempat Lahir</label>
		<input type="text" id="tempatlhr" name="tempatlhr"><br>
		<label for="tanggallhr">Tanggal Lahir</label>
		<input type="date" id="tanggallhr" name="tanggallhr"><br>
		<label for="prodi">Program Studi</label>
		<input type="text" id="prodi" name="prodi"><br>
		<label for="alamat">Alamat</label>
		<input type="text" id="alamat" name="alamat"><br>
		<label for="email">Email</label>
		<input type="email" id="email" name="email"><br><br>
		<input type="submit" value="Register">
	</form>
</body>
</html>
