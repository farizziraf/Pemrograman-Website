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
<<<<<<< HEAD
                            <span>Daya Tampung Maba <br>2023</span>
=======
                            <span>Daya Tampung Maba <br>2023 2023</span>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
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
<<<<<<< HEAD
                <p class="judul">
                    Tahap Pendaftaran MABA 2023 Jalur Mandiri Reguler
                </p>
=======
                <p class="judul">Tahap Pendaftaran MABA 2023 Jalur Mandiri Reguler</p>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
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
<<<<<<< HEAD
                    <a class="tahap_btn disabled" href="jmr_biodata.php"
                        >Entry Biodata</a>
=======
                    <a class="tahap_btn" href="jmr_biodata.php">Entry Biodata</a>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                </div>
                <div class="tahap_step">
                    <p>Tahap 3</p>
                </div>
                <div class="tahap_content">
                    <p>Data Sekolah</p>
<<<<<<< HEAD
                    <a
                        class="tahap_btn disabled"
                        href="jmr_datasekolah.php"
                        >Entry Data Sekolah SMA/MA/SMK</a>
=======
                    <a class="tahap_btn" href="jmr_datasekolah.php">Entry Data Sekolah SMA/MA/SMK</a>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                </div>
                <div class="tahap_step">
                    <p>Tahap 4</p>
                </div>
                <div class="tahap_content">
                    <p>Nilai Raport</p>
<<<<<<< HEAD
                    <a class="tahap_btn disabled" href="jmr_raport.php"
                        >Entry Rata-rata Nilai Raport</a>
=======
                    <a class="tahap_btn" href="jmr_raport.php">Entry Rata-rata Nilai Raport</a>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                </div>
                <div class="tahap_step">
                    <p>Tahap 5</p>
                </div>
                <div class="tahap_content">
                    <p>Nilai MAPEL Pendukung Pilihan 1</p>
<<<<<<< HEAD
                    <a
                        class="tahap_btn disabled"
                        href="jmr_nilaipendukung1.php"
                        >Entry Rata-rata Nilai Mata Pelajaran Pendukung Pilihan 1</a>
=======
                    <a class="tahap_btn" href="jmr_nilaipendukung1.php">Entry Rata-rata Nilai Mata Pelajaran Pendukung Pilihan 1</a>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                </div>
                <div class="tahap_step">
                    <p>Tahap 6</p>
                </div>
                <div class="tahap_content">
                    <p>Nilai MAPEL Pendukung Pilihan 2</p>
<<<<<<< HEAD
                    <a
                        class="tahap_btn disabled"
                        href="jmr_nilaipendukung2.php"
                        >Entry Rata-rata Nilai Mata Pelajaran Pendukung Pilihan 2</a>
=======
                    <a class="tahap_btn" href="jmr_nilaipendukung2.php">Entry Rata-rata Nilai Mata Pelajaran Pendukung Pilihan 2</a>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                </div>
                <div class="tahap_step">
                    <p>Tahap 7</p>
                </div>
                <div class="tahap_content">
                    <p>IPI/SPI</p>
<<<<<<< HEAD
                    <a class="tahap_btn disabled" href="jmr_ipispi.php">Entry IPI/SPI</a>
=======
                    <a class="tahap_btn" href="jmr_ipispi.php">Entry IPI/SPI</a>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                </div>
                <div class="tahap_step">
                    <p>Tahap 8</p>
                </div>
                <div class="tahap_content">
                    <p>Cetak Kartu Ujian CBT</p>
<<<<<<< HEAD
                    <a class="tahap_btn disabled" href="jmr_cbt.php">Cetak Kartu Ujian CBT</a>
=======
                    <a class="tahap_btn" href="jmr_cbt.php">Cetak Kartu Ujian CBT</a>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD

    <script>
        // Dapatkan elemen tautan tahap
        const tahapLinks = document.querySelectorAll('.tahap_content a');
        
        // Ambil tahap terakhir yang diselesaikan dari session storage
        const lastCompletedTahap = sessionStorage.getItem('lastCompletedTahap');
        
        // Jika tahap terakhir telah diselesaikan, set tahap berikutnya yang bisa diakses
        let nextTahap = 1;
        if (lastCompletedTahap !== null) {
            nextTahap = parseInt(lastCompletedTahap) + 1;
        }
        
        // Tambahkan pendengar acara untuk setiap tautan tahap
        for (let i = 0; i < tahapLinks.length; i++) {
            const currentTahap = i + 1;
            
            // Nonaktifkan tautan jika belum mencapai tahap yang diizinkan
            if (currentTahap > nextTahap) {
                tahapLinks[i].addEventListener('click', (event) => {
                    event.preventDefault();
                    alert('Silakan selesaikan tahap sebelumnya terlebih dahulu.');
                });
                tahapLinks[i].classList.add('disabled');
            } else {
                // Aktifkan tautan jika mencapai atau melebihi tahap yang diizinkan
                tahapLinks[i].addEventListener('click', () => {
                    // Simpan tahap terakhir yang diselesaikan di session storage
                    sessionStorage.setItem('lastCompletedTahap', currentTahap);
                });
            }
        }
    </script>

</body>

</html>
=======
</body>

</html>
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
