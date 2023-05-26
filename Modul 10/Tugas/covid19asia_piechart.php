<!DOCTYPE html>
<html>

<head>
    <title>COVID-19 Pie Chart</title>
    <!-- Load Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins';
            font-style: normal;
            margin: 0px;
        }

        #chartContainer {
            width: 100%;
            height: 500px;
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>
</head>

<body>
    <div id="chartContainer">
        <h2>Total Cases</h2>
        <canvas id="totalCases_covidChart"></canvas><br>
        <h2>Total Deaths</h2>
        <canvas id="totalDeaths_covidChart"></canvas><br>
        <h2>Total Recovered</h2>
        <canvas id="totalRecovered_covidChart"></canvas><br>
        <h2>Active Cases</h2>
        <canvas id="activeCases_covidChart"></canvas><br>
        <h2>Total Tests</h2>
        <canvas id="totalTests_covidChart"></canvas>
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
        var ctx = document.getElementById('totalCases_covidChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($countries); ?>,
                datasets: [
                    {
                        label: 'Total Cases',
                        data: <?php echo json_encode($totalCases); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 0, 0, 0.5)',
                            'rgba(0, 255, 0, 0.5)',
                            'rgba(0, 0, 255, 0.5)',
                            'rgba(128, 128, 128, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(0, 0, 255, 1)',
                            'rgba(128, 128, 128, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
    <script>
        // Create a new chart
        var ctx = document.getElementById('totalDeaths_covidChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($countries); ?>,
                datasets: [
                    {
                        label: 'Total Deaths',
                        data: <?php echo json_encode($totalDeaths); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 0, 0, 0.5)',
                            'rgba(0, 255, 0, 0.5)',
                            'rgba(0, 0, 255, 0.5)',
                            'rgba(128, 128, 128, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(0, 0, 255, 1)',
                            'rgba(128, 128, 128, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
    <script>
        // Create a new chart
        var ctx = document.getElementById('totalRecovered_covidChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($countries); ?>,
                datasets: [
                    {
                        label: 'Total Recovered',
                        data: <?php echo json_encode($totalRecovered); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 0, 0, 0.5)',
                            'rgba(0, 255, 0, 0.5)',
                            'rgba(0, 0, 255, 0.5)',
                            'rgba(128, 128, 128, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(0, 0, 255, 1)',
                            'rgba(128, 128, 128, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
    <script>
        // Create a new chart
        var ctx = document.getElementById('activeCases_covidChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($countries); ?>,
                datasets: [
                    {
                        label: 'Active Cases',
                        data: <?php echo json_encode($activeCases); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 0, 0, 0.5)',
                            'rgba(0, 255, 0, 0.5)',
                            'rgba(0, 0, 255, 0.5)',
                            'rgba(128, 128, 128, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(0, 0, 255, 1)',
                            'rgba(128, 128, 128, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
    <script>
        // Create a new chart
        var ctx = document.getElementById('totalTests_covidChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($countries); ?>,
                datasets: [
                    {
                        label: 'Total Tests',
                        data: <?php echo json_encode($totalTests); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 0, 0, 0.5)',
                            'rgba(0, 255, 0, 0.5)',
                            'rgba(0, 0, 255, 0.5)',
                            'rgba(128, 128, 128, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(0, 0, 255, 1)',
                            'rgba(128, 128, 128, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
</body>

</html>