<?php
session_start();

// Periksa apakah pengguna telah login dan memiliki peran "admin"
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

<<<<<<< HEAD
if (isset($_POST['export'])) {
    include('data_pendaftar.php');
}
=======
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<<<<<<< HEAD
    <title>Admin</title>
=======
    <title>JMR</title>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
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
<<<<<<< HEAD
                        <a href="admin.php" class="link flex">
                            <i class="bx bx-table"></i>
                            <span>Data Pendaftar</span>
=======
                        <a href="user.php" class="link flex">
                            <i class="bx bx-home-alt"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="jmr.php" class="link flex">
                            <i class="bx bx-grid-alt"></i>
                            <span>Mandiri Jalur Reguler</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="brosur maba 2023.pdf" class="link flex">
                            <i class="bx bxs-file-pdf"></i>
                            <span>Brosur Maba 2023</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="Salinan_Kep_Rektor_Daya_Tampung_Awal_Mahasiswa_Baru_Program_Sarjana_UPNV_Jawa_Timur_Tahun_2023.pdf" class="link flex">
                            <i class="bx bxs-file-pdf"></i>
                            <span>Daya Tampung Maba <br>2023 2023</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="#" class="link flex">
                            <i class="bx bx-table"></i>
                            <span>Daftar Program Studi</span>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                        </a>
                    </li>

                    <li class="item">
<<<<<<< HEAD
                        <a href="admin_chart1.php" class="link flex">
                            <i class="bx bxs-doughnut-chart"></i>
                            <span>Chart Perbandingan <br>Gender Pendaftar</span>
=======
                        <a href="Daftar_UKT_Prodi_S1.pdf" class="link flex">
                            <i class="bx bxs-file-pdf"></i>
                            <span>SK UKT Prodi S1</span>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                        </a>
                    </li>

                    <li class="item">
<<<<<<< HEAD
                        <a href="admin_chart2.php" class="link flex">
                            <i class="bx bxs-bar-chart-alt-2"></i>
                            <span>Chart Tahun Lulusan <br>Pendaftar</span>
=======
                        <a href="Daftar_SPI_Prodi_S1.pdf" class="link flex">
                            <i class="bx bxs-file-pdf"></i>
                            <span>SK SPI Prodi S1</span>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                        </a>
                    </li>

                    <li class="item">
<<<<<<< HEAD
                        <a href="admin_chart3.php" class="link flex">
                            <i class="bx bxs-bar-chart-alt-2"></i>
                            <span>Chart Pilihan Program <br>Studi Pendaftar</span>
=======
                        <a href="#" class="link flex">
                            <i class="bx bx-award"></i>
                            <span>Award</span>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
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
<<<<<<< HEAD
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
=======
        <h2>Responsive Sidebar Example</h2>
        <p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px
            or less.</p>
        <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center
            the navigation links.</p>
        <h3>Resize the browser window to see the effect.</h3>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
    </div>
</body>

</html>