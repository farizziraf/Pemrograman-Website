<!DOCTYPE html>
<html>

<head>
    <title>Grafik Perbandingan Total Cases 10 Negara</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="pieChart"></canvas>

    <script>
        // Mengambil data dari database menggunakan PHP
        <?php
        include 'koneksi_covid.php';

        $query = "SELECT country, total_cases FROM covid_data ORDER BY total_cases DESC LIMIT 10";
        $result = mysqli_query($koneksi, $query);

        $countryLabels = array();
        $totalCases = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $countryLabels[] = $row['country'];
            $totalCases[] = $row['total_cases'];
        }

        mysqli_close($koneksi);
        ?>

        // Membuat grafik menggunakan Chart.js
        const ctx = document.getElementById('pieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($countryLabels); ?>,
                datasets: [{
                    label: 'Total Cases',
                    data: <?php echo json_encode($totalCases); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true
            }
        });
    </script>
</body>

</html>