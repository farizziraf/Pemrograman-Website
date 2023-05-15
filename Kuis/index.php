<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h3>Sistem Informasi Akademik Fasilkom UPN Jatim</h3>
	<form action="login.php" method="post">
		<label for="username">Username</label>
		<input type="text" id="username" name="username"><br><br>
        <label for="pass">Password</label>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="Login"><br><br>
		<p><a href='lupapass.php'>Lupa Password</a></p>
		<p><a href='registrasi.php'>Registrasi</a></p>
	</form>
</body>
</html>
