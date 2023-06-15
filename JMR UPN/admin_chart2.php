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
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
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
        <p class="judul">Bar Chart - Tahun Lulusan Pendaftar</p>
        <canvas id="barChart"></canvas>
    </div>

    <script>
    // Mengambil data dari database menggunakan PHP
    <?php
    include 'koneksi.php';

    $query = "SELECT tahun_lulus, COUNT(*) AS jumlah_lulusan FROM jmr_datasekolah GROUP BY tahun_lulus ORDER BY tahun_lulus";
    $result = mysqli_query($conn, $query);

    $tahunLulusLabels = array();
    $jumlahLulusan = array();
    $warna = array('#2D4E38');

    $indexWarna = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $tahunLulusLabels[] = $row['tahun_lulus'];
        $jumlahLulusan[] = $row['jumlah_lulusan'];

        // Memastikan warna tidak melebihi jumlah warna yang ada
        if ($indexWarna >= count($warna)) {
            $indexWarna = 0;
        }

        // Menambahkan warna untuk setiap tahun lulus
        $warnaData[] = $warna[$indexWarna];

        $indexWarna++;
    }

    mysqli_close($conn);
    ?>

    // Membuat grafik menggunakan Chart.js
    const ctx = document.getElementById('barChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($tahunLulusLabels); ?>,
            datasets: [{
                label: 'Tahun Lulusan Pendaftar',
                data: <?php echo json_encode($jumlahLulusan); ?>,
                backgroundColor: <?php echo json_encode($warnaData); ?>,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

</body>

</html>
