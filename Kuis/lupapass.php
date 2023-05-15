<!DOCTYPE html>
<html>
<head>
	<title>Lupa Password Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h3>Reset Password</h3>
    <p>Silahkan masukkan username dan email yang terdaftar</p>
	<form action="lupa.php" method="post">
    <label for="username">Username</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="email">Email</label>
		<input type="email" id="email" name="email"><br><br>
		<input type="submit" value="Kirim">
	</form>
</body>
</html>
