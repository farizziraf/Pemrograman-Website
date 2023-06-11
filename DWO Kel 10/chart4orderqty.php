<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/logo2.png">
    <title>
        DWO Kelompok 10
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <style>
        #sidenav-main {
            height: 100vh;
            overflow: hidden;
            /* Hide the scrollbar from the outer container */
        }

        #sidenav-main .navbar-collapse {
            height: calc(100% - 60px);
            /* Adjust the value based on your header height */
            overflow-y: auto;
        }

        #sidenav-main .navbar-nav {
            margin-bottom: 20px;
            /* Add some bottom margin to create space for the last items */
        }

        #sidenav-main .list-group-item:last-child {
            margin-bottom: 20px;
            /* Add margin to the last item to push it up */
        }

        #sidenav-collapse-main {
            height: calc(100% - 60px);
            /* Adjust the value based on your header height */
            overflow-y: auto;
            /* Add a scrollbar to the inner container */
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 ">
                <img src="assets/img/logo2.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">DWO Kelompok 10 </span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#nav-collapse">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Order Quantity</span>
                    </a>
                    <div class="collapse" id="nav-collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a class="nav-link" href="chart1orderqty.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>
                                    <span class="nav-link-text ms-1">Chart 1</span>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a class="nav-link " href="chart2orderqty.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>

                                    <span class="nav-link-text ms-1">Chart 2</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="nav-link " href="chart3orderqty.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>

                                    <span class="nav-link-text ms-1">Chart 3</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="nav-link " href="chart4orderqty.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>

                                    <span class="nav-link-text ms-1">Chart 4</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="nav-link " href="chart5orderqty.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>

                                    <span class="nav-link-text ms-1">Chart 5</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chart5orderqty.php" data-bs-toggle="collapse"
                        data-bs-target="#nav-collapse2">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Total Due</span>
                    </a>
                    <div class="collapse" id="nav-collapse2">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a class="nav-link" href="chart1totaldue.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>
                                    <span class="nav-link-text ms-1">Chart 1</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="nav-link " href="chart2totaldue.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>

                                    <span class="nav-link-text ms-1">Chart 2</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="nav-link " href="chart3totaldue.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>

                                    <span class="nav-link-text ms-1">Chart 3</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="nav-link " href="chart4totaldue.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>

                                    <span class="nav-link-text ms-1">Chart 4</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="nav-link " href="chart5totaldue.php">
                                    <div
                                        class="icon icon-shape icon-xs border-radius-md text-center me-2 d-flex align-items-center justify-content-center bg-gradient-info">
                                        <img src="assets/img/chart2.png" alt="Chart Icon" class="chart-icon">
                                    </div>

                                    <span class="nav-link-text ms-1">Chart 5</span>
                                </a>
                            </li>
                    </div>

    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Order Quantity</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Chart 4</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Chart 4</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Due</p>
                                        <h5 class="font-weight-bolder">
                                            $3,478,115,532
                                        </h5>
                                        <p class="mb-0">
                                            Dari 2001 - 2004
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Order Quantity</p>
                                        <h5 class="font-weight-bolder">
                                            274,914
                                        </h5>
                                        <p class="mb-0">
                                            Dari 2001 - 2004
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Sold products</p>
                                        <h5 class="font-weight-bolder">
                                        266
                                        </h5>
                                        <p class="mb-0">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                            Dari 2001 - 2004
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales days</p>
                                        <h5 class="font-weight-bolder">
                                        1124
                                        </h5>
                                        <p class="mb-0">
                                            <span class="text-success text-sm font-weight-bolder"></span> 
                                            Dari 2001 - 2004
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            
        
        <div class="row mt-4">
                <div class="col-lg-12 mb-lg-12 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h6 class="text-capitalize text-center">Bar Chart</h6>
<p class="text-sm mb-0" style="text-align: center;">
    <span class="font-weight-bold">Apa yang merupakan Top 10 produk dengan order quantity terbanyak pada territory "Europe" pada tahun 2004?</span> 
</p>                            
                        </div>
                        <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-bar" class="chart-canvas" style="width: 100%; height: 500px;"></canvas>
                        </div>
                </div>
            </div>
    </div>


    </main>
    
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <script>
    var ctx = document.getElementById('chart-bar').getContext('2d');

    <?php
    $query = "SELECT p.product_name, SUM(fp.orderqty) AS total_order_qty 
              FROM sales_fact fp 
              JOIN product_dim p ON fp.product_id = p.product_id 
              JOIN territory_dim t ON fp.territory_id = t.territory_id 
              JOIN time_dim d ON fp.time_id = d.time_id 
              WHERE t.territory_group = 'Europe' AND d.year = 2004 
              GROUP BY p.product_name 
              ORDER BY total_order_qty DESC 
              LIMIT 10";
    $result = mysqli_query($conn, $query);

    $products = [];
    $orderQuantities = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row['product_name'];
        $orderQuantities[] = $row['total_order_qty'];
    }

    // Generate random colors for each dataset
    $colors = [];
    for ($i = 0; $i < count($products); $i++) {
        $colors[] = "rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.8)";
    }

    $data = [
        'labels' => $products,
        'datasets' => [
            [
                'label' => 'Order Quantity',
                'data' => $orderQuantities,
                'backgroundColor' => $colors,
                'borderWidth' => 1
            ]
        ]
    ];
    ?>

    var data = <?php echo json_encode($data); ?>;

    var options = {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Top 10 Products with Highest Order Quantity (Europe, 2004)',
                font: {
                    size: 16
                }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Product'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Order Quantity'
                }
            }
        }
    };

    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>



    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>