<?php
session_start();

// Periksa apakah pengguna telah login dan memiliki peran "user"
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
                        <a href="Salinan_Kep_Rektor_Daya_Tampung_Awal_Mahasiswa_Baru_Program_Sarjana_UPNV_Jawa_Timur_Tahun_2023.pdf"
                            class="link flex">
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
    <p class="judul">Program Studi yang ada di UPN Veteran Jawa Timur</p>
    <div class="tabel_prodi">
            <table>
                <tr>
                    <th>Fakultas</th>
                    <th>Program Studi</th>
                </tr>
                <tr>
                    <td rowspan="4"><a href="http://febis.upnjatim.ac.id/">Fakultas Ekonomi & Bisnis</a></td>
                    <td><a href="http://ekbang.upnjatim.ac.id/">Ekonomi Pembangunan</a></td>
                </tr>
                <tr>
                    <td><a href="http://manajemen.upnjatim.ac.id/">Manajemen</a></td>
                </tr>
                <tr>
                    <td><a href="http://akuntansi.upnjatim.ac.id/">Akuntansi</a></td>
                </tr>
                <tr>
                    <td><a href="http://kewirausahaan.upnjatim.ac.id/">Kewirausahaan</a></td>
                </tr>
                <tr>
                    <td rowspan="6"><a href="http://fti.upnjatim.ac.id/">Fakultas Teknik</a></td>
                    <td><a href="http://tekindustri.upnjatim.ac.id/">Teknik Industri</a></td>
                </tr>
                <tr>
                    <td><a href="http://tekkimia.upnjatim.ac.id/">Teknik Kimia</a></td>
                </tr>
                <tr>
                    <td><a href="http://tekpangan.upnjatim.ac.id/">Teknologi Pangan</a></td>
                </tr>
                <tr>
                    <td><a href="http://teksipil.upnjatim.ac.id/">Teknik Sipil</a></td>
                </tr>
                <tr>
                    <td><a href="http://teklingk.upnjatim.ac.id/">Teknik Lingkungan</a></td>
                </tr>
                <tr>
                    <td><a href="http://www.upnjatim.ac.id/">Teknik Mesin</a></td>
                </tr>
                <tr>
                    <td rowspan="4"><a href="http://fik.upnjatim.ac.id/">Fakultas Ilmu Komputer</a></td>
                    <td><a href="http://if.upnjatim.ac.id/">Informatika</a></td>
                </tr>
                <tr>
                    <td><a href="http://sisfo.upnjatim.ac.id/">Sistem Informasi</a></td>
                </tr>
                <tr>
                    <td><a href="http://sada.upnjatim.ac.id/">Sains Data</a></td>
                </tr>
                <tr>
                    <td><a href="http://www.upnjatim.ac.id/">Bisnis Digital</a></td>
                </tr>
                <tr>
                    <td rowspan="6"><a href="http://fisip.upnjatim.ac.id/">Fakultas Ilmu Sosial & Politik</a></td>
                    <td><a href="http://adneg.upnjatim.ac.id/">Administrasi Negara</a></td>
                </tr>
                <tr>
                    <td><a href="http://adbis.upnjatim.ac.id/">Administrasi Bisnis</a></td>
                </tr>
                <tr>
                    <td><a href="http://ilkom.upnjatim.ac.id/">Ilmu Komunikasi</a></td>
                </tr>
                <tr>
                    <td><a href="http://hubint.upnjatim.ac.id/">Hubungan Internasional</a></td>
                </tr>
                <tr>
                    <td><a href="http://www.upnjatim.ac.id/">Pariwisata</a></td>
                </tr>
                <tr>
                    <td><a href="http://www.upnjatim.ac.id/">Linguistik Indonesia</a></td>
                </tr>
                <tr>
                    <td rowspan="3"><a href="http://fad.upnjatim.ac.id/">Fakultas Arsitektur & Desain</a></td>
                    <td><a href="http://arsitektur.upnjatim.ac.id/">Arsitektur</a></td>
                </tr>
                <tr>
                    <td><a href="http://dkv.upnjatim.ac.id/">Desain Komunikasi Visual</a></td>
                </tr>
                <tr>
                    <td><a href="http://www.upnjatim.ac.id/">Desain Interior</a></td>
                </tr>
                <tr>
                    <td rowspan="2"><a href="">Fakultas Pertanian</a></td>
                    <td><a href="http://agrotek.upnjatim.ac.id/">Agroteknologi</a></td>
                </tr>
                <tr>
                    <td><a href="http://agribis.upnjatim.ac.id/">Agribisnis</a></td>
                </tr>
                <tr>
                    <td rowspan="1"><a href="http://fhukum.upnjatim.ac.id/">Fakultas Hukum</a></td>
                    <td><a href="http://ilkum.upnjatim.ac.id/">Hukum</a></td>
                </tr>
                <tr>
                    <td rowspan="1"><a href="http://fk.upnjatim.ac.id/">Fakultas Kedokteran</a></td>
                    <td><a href="http://fk.upnjatim.ac.id/">Kedokteran</a></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>