<!DOCTYPE html>
<html>

<head>
    <title>COVID-19 Doughnut Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chartContainer {
            width: 100%;
            height: 500px;
            max-width: 1200px;
            margin: 0 auto;
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>
</head>

<body>
    <div id="chartContainer">
        <canvas id="covidChart"></canvas>
    </div>

    <?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "covid_19_asia");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from the database
    $query = "SELECT country, total_cases, total_deaths, total_recovered, active_cases, total_tests FROM covid_data";
    $result = mysqli_query($conn, $query);

    $countries = [];
    $totalCases = [];
    $totalDeaths = [];
    $totalRecovered = [];
    $activeCases = [];
    $totalTests = [];
    $colors = [];

    // Define custom colors for each country
    $customColors = [
        'India' => 'rgba(255, 99, 132, 0.7)',
        'Japan' => 'rgba(54, 162, 235, 0.7)',
        'S. Korea' => 'rgba(75, 192, 192, 0.7)',
        'Turkey' => 'rgba(255, 206, 86, 0.7)',
        'Vietnam' => 'rgba(153, 102, 255, 0.7)',
        'Taiwan' => 'rgba(255, 159, 64, 0.7)',
        'Iran' => 'rgba(0, 128, 0, 0.7)',
        'Indonesia' => 'rgba(255, 0, 0, 0.7)'
    ];

    while ($row = mysqli_fetch_assoc($result)) {
        $countries[] = $row['country'];
        $totalCases[] = $row['total_cases'];
        $totalDeaths[] = $row['total_deaths'];
        $totalRecovered[] = $row['total_recovered'];
        $activeCases[] = $row['active_cases'];
        $totalTests[] = $row['total_tests'];
        $colors[] = $customColors[$row['country']];
    }

    // Close database connection
    mysqli_close($conn);
    ?>

    <script>
        // Create doughnut chart
        var ctx = document.getElementById('covidChart').getContext('2d');
        var doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($countries); ?>,
                datasets: [{
                    label: 'Total Cases',
                    data: <?php echo json_encode($totalCases); ?>,
                    backgroundColor: <?php echo json_encode($colors); ?>
                }, {
                    label: 'Total Deaths',
                    data: <?php echo json_encode($totalDeaths); ?>,
                    backgroundColor: <?php echo json_encode($colors); ?>
                }, {
                    label: 'Total Recovered',
                    data: <?php echo json_encode($totalRecovered); ?>,
                    backgroundColor: <?php echo json_encode($colors); ?>
                }, {
                    label: 'Active Cases',
                    data: <?php echo json_encode($activeCases); ?>,
                    backgroundColor: <?php echo json_encode($colors); ?>
                }, {
                    label: 'Total Tests',
                    data: <?php echo json_encode($totalTests); ?>,
                    backgroundColor: <?php echo json_encode($colors); ?>
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>

</html>