<!DOCTYPE html>
<html>
<head>
	<title>Login Successful</title>
</head>
<body>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = $_POST['name'];
			$email = $_POST['email'];
			if(empty($name) || empty($email)) {
				header("Location: login_error.php");
				exit();
			} else {
				date_default_timezone_set("Asia/Jakarta");
				$date = date("Y-m-d");
				$time = date("H:i:s");
				$day = date("l");
	
				echo "<!DOCTYPE html>
				<html>
				<head>
				</head>
				<body>
					<h2>Login Successful</h2>
					<p>Nama: $name</p>
					<p>Email: $email</p>
					<p>Tanggal Login: $day, $date, $time</p>
					<p><a href='biodata.php'>Masuk ke halaman Biodata</a></p>
				</body>
				</html>";
			}
		}
	?>
</body>
</html>