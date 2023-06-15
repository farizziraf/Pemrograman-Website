<?php
session_start();

// Periksa apakah pengguna telah login dan memiliki peran "admin"
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if (isset($_POST['export'])) {
    include('data_pendaftar.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="Assets/Foto/logo_upn.png">
    <link rel="stylesheet" href="style.css" />
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <nav class="sidebar">

        <div class="logo_items flex">
            <span class="nav_image">
                <img src="Assets/Foto/logo_upn.png" alt="logo_img" />
            </span>
            <span class="logo_name">SIMABA UPN</span>
        </div>

        <div class="menu_container">
            <div class="menu_items">
                <ul class="menu_item">
                    <li class="item">
                        <a href="admin.php" class="link flex">
                            <i class="bx bx-table"></i>
                            <span>Data Pendaftar</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="admin_chart1.php" class="link flex">
                            <i class="bx bxs-doughnut-chart"></i>
                            <span>Chart Perbandingan <br>Gender Pendaftar</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="admin_chart2.php" class="link flex">
                            <i class="bx bxs-bar-chart-alt-2"></i>
                            <span>Chart Tahun Lulusan <br>Pendaftar</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="admin_chart3.php" class="link flex">
                            <i class="bx bxs-bar-chart-alt-2"></i>
                            <span>Chart Pilihan Program <br>Studi Pendaftar</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="logout.php" class="link flex">
                            <i class="bx bx-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <div class="content">
        <p class="judul">Data Pendaftar Jalur Mandiri Reguler UPN "Veteran" Jawa Timur</p>
        <div class="tabel_data">
            <table>
                <tr>
                    <th>ID</th>
                    <th>ID Pendaftaran</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                </tr>
                <?php
                // Koneksi ke database
                require_once 'koneksi.php';

                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);

                // Memeriksa apakah terdapat data
                if (mysqli_num_rows($result) > 0) {
                    // Menampilkan data dalam tabel
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['id_pendaftaran'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['nomor_telepon'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Menampilkan pesan jika tidak ada data
                    echo "<tr><td colspan='5'>Tidak ada data pengguna.</td></tr>";
                }
                ?>
            </table>
        </div>
        <form method="POST" action="">
            <button class="btn_excel" type="submit" name="export">Export Data to Excel</button>
        </form>
    </div>
</body>

</html>