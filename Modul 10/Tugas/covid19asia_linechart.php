<!DOCTYPE html>
<html>

<head>
    <title>COVID-19 Line Chart</title>
    <!-- Load Chart.js library -->
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

    // Fetch data from the table
    $query = "SELECT * FROM covid_data";
    $result = mysqli_query($conn, $query);

    // Initialize arrays to store data for each category
    $countries = [];
    $totalCases = [];
    $totalDeaths = [];
    $totalRecovered = [];
    $activeCases = [];
    $totalTests = [];

    // Fetch and store data in arrays
    while ($row = mysqli_fetch_assoc($result)) {
        $countries[] = $row['country'];
        $totalCases[] = $row['total_cases'];
        $totalDeaths[] = $row['total_deaths'];
        $totalRecovered[] = $row['total_recovered'];
        $activeCases[] = $row['active_cases'];
        $totalTests[] = $row['total_tests'];
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <script>
        // Create a new chart
        var ctx = document.getElementById('covidChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($countries); ?>,
                datasets: [
                    {
                        label: 'Total Cases',
                        data: <?php echo json_encode($totalCases); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Deaths',
                        data: <?php echo json_encode($totalDeaths); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Recovered',
                        data: <?php echo json_encode($totalRecovered); ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Active Cases',
                        data: <?php echo json_encode($activeCases); ?>,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Tests',
                        data: <?php echo json_encode($totalTests); ?>,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>