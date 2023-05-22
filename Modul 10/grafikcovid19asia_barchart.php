<!DOCTYPE html>
<html>
<head>
    <title>Grafik Perbandingan Total Cases 10 Negara</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="barChart"></canvas>

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
        const ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($countryLabels); ?>,
                datasets: [{
                    label: 'Total Cases',
                    data: <?php echo json_encode($totalCases); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
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
                        ticks: {
                            stepSize: 10000000
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
