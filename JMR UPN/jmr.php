<?php
session_start();

// Periksa apakah pengguna telah login dan memiliki peran "admin"
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
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
    <title>JMR</title>
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
                        <a href="programstudi.php" class="link flex">
                            <i class="bx bx-table"></i>
                            <span>Program Studi</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="Daftar_UKT_Prodi_S1.pdf" class="link flex">
                            <i class="bx bxs-file-pdf"></i>
                            <span>SK UKT Prodi S1</span>
                        </a>
                    </li>

                    <li class="item">
                        <a href="Daftar_SPI_Prodi_S1.pdf" class="link flex">
                            <i class="bx bxs-file-pdf"></i>
                            <span>SK SPI Prodi S1</span>
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
        <div class="tahap">
            <div class="tahap_item">
                <p class="judul">Tahap Pendaftaran MABA 2023 Jalur Mandiri Reguler</p>
                <div class="tahap_step">
                    <p>Tahap 1</p>
                </div>
                <div class="tahap_content">
                    <p>Memilih Program Studi</p>
                    <a class="tahap_btn" href="jmr_prodi.php">Memilih Dua Program Studi</a>
                </div>
                <div class="tahap_step">
                    <p>Tahap 2</p>
                </div>
                <div class="tahap_content">
                    <p>Biodata</p>
                    <a class="tahap_btn" href="jmr_biodata.php">Entry Biodata</a>
                </div>
                <div class="tahap_step">
                    <p>Tahap 3</p>
                </div>
                <div class="tahap_content">
                    <p>Data Sekolah</p>
                    <a class="tahap_btn" href="jmr_datasekolah.php">Entry Data Sekolah SMA/MA/SMK</a>
                </div>
                <div class="tahap_step">
                    <p>Tahap 4</p>
                </div>
                <div class="tahap_content">
                    <p>Nilai Raport</p>
                    <a class="tahap_btn" href="jmr_raport.php">Entry Rata-rata Nilai Raport</a>
                </div>
                <div class="tahap_step">
                    <p>Tahap 5</p>
                </div>
                <div class="tahap_content">
                    <p>Nilai MAPEL Pendukung Pilihan 1</p>
                    <a class="tahap_btn" href="jmr_nilaipendukung1.php">Entry Rata-rata Nilai Mata Pelajaran Pendukung Pilihan 1</a>
                </div>
                <div class="tahap_step">
                    <p>Tahap 6</p>
                </div>
                <div class="tahap_content">
                    <p>Nilai MAPEL Pendukung Pilihan 2</p>
                    <a class="tahap_btn" href="jmr_nilaipendukung2.php">Entry Rata-rata Nilai Mata Pelajaran Pendukung Pilihan 2</a>
                </div>
                <div class="tahap_step">
                    <p>Tahap 7</p>
                </div>
                <div class="tahap_content">
                    <p>IPI/SPI</p>
                    <a class="tahap_btn" href="jmr_ipispi.php">Entry IPI/SPI</a>
                </div>
                <div class="tahap_step">
                    <p>Tahap 8</p>
                </div>
                <div class="tahap_content">
                    <p>Cetak Kartu Ujian CBT</p>
                    <a class="tahap_btn" href="jmr_cbt.php">Cetak Kartu Ujian CBT</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>