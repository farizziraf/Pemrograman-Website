<!DOCTYPE html>
<html>
    <head>
        <title>Koneksi Database MySQL</title>
    </head>
    <body>
        <h1>Demo Koneksi database MySQL</h1>

        <?php
            $con = mysqli_connect("localhost", "root", "", "myDB");

            // Check connection
            if (mysqli_connect_errno()) {
                exit("Failed to connect to MySQL: " . mysqli_connect_error());
            }
        
            echo "Successfully connected to MySQL!";
        ?>
    </body>
</html>
