<?php
session_start();

// Periksa apakah pengguna telah login dan memiliki peran "admin"
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
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
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <a href="" class="link flex">
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
        <p class="judul">Bar Chart - Pilihan Program Studi Pendaftar</p>
        <canvas id="barChart"></canvas>
    </div>

    <script>
        // Mengambil data program studi dari database menggunakan PHP
        <?php
        include 'koneksi.php';

        $query = "SELECT j.prodi, COUNT(CASE WHEN ps.program_studi1 = j.jurusan_id THEN 1 END) AS jumlah_pilihan1, COUNT(CASE WHEN ps.program_studi2 = j.jurusan_id THEN 1 END) AS jumlah_pilihan2
                  FROM jmr_programstudi AS ps
                  INNER JOIN jurusan AS j ON ps.program_studi1 = j.jurusan_id OR ps.program_studi2 = j.jurusan_id
                  GROUP BY j.prodi
                  ORDER BY j.jurusan_id";
        $result = mysqli_query($conn, $query);

        $programStudiLabels = array();
        $jumlahPendaftarPilihan1 = array();
        $jumlahPendaftarPilihan2 = array();
        $warna = array('#2D4E38', '#F46C4E');

        while ($row = mysqli_fetch_assoc($result)) {
            $programStudiLabels[] = $row['prodi'];
            $jumlahPendaftarPilihan1[] = $row['jumlah_pilihan1'];
            $jumlahPendaftarPilihan2[] = $row['jumlah_pilihan2'];
        }

        mysqli_close($conn);
        ?>

        // Membuat grafik menggunakan Chart.js
        const ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($programStudiLabels); ?>,
                datasets: [
                    {
                        label: 'Pilihan 1',
                        data: <?php echo json_encode($jumlahPendaftarPilihan1); ?>,
                        backgroundColor: <?php echo json_encode($warna[0]); ?>,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Pilihan 2',
                        data: <?php echo json_encode($jumlahPendaftarPilihan2); ?>,
                        backgroundColor: <?php echo json_encode($warna[1]); ?>,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>