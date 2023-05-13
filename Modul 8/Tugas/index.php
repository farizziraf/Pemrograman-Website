<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style_login.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="mainLogin">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="register.php" method="POST">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" id="txt" name="username" placeholder="User" required>
                <input type="email" id="emailDaftar" name="email" placeholder="Email" required>
                <input type="password" id="pswdDaftar" name="password" placeholder="Password" required>
                <button type="submit" name="register">Daftar</button>
            </form>
        </div>


        <div class="login">
            <form action="login.php" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" id="emailLogin" name="email" placeholder="Email" required>
                <input type="password" id="pswdLogin" name="password" placeholder="Password" required>
                <button type="submit" name="login">Masuk</button>
            </form>
        </div>

    </div>
</body>

</html>