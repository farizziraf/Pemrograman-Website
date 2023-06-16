<?php
session_start();

// Periksa apakah pengguna telah login dan memiliki peran "user"
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
  header('Location: login.php');
  exit();
}

// Koneksi ke database
require_once 'koneksi.php';

// Mendapatkan data pengguna
$id_pendaftaran = $_SESSION['username'];

// Query untuk mendapatkan nama pengguna berdasarkan id_pendaftaran
$sql_pengguna = "SELECT nama FROM users WHERE id_pendaftaran = '$id_pendaftaran'";
$result_pengguna = mysqli_query($conn, $sql_pengguna);
$row_pengguna = mysqli_fetch_assoc($result_pengguna);
$nama = $row_pengguna['nama'];

// Memproses data saat form pengajuan dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $npsn = $_POST['npsn'];
  $nama_sekolah = $_POST['nama_sekolah'];
  $status_sekolah = $_POST['status_sekolah'];
  $nisn = $_POST['nisn'];
  $tahun_lulus = $_POST['tahun_lulus'];

  // Insert data ke tabel pendaftaran_datasekolah
  $sql_insert = "INSERT INTO jmr_datasekolah (id_pendaftaran, npsn, nama_sekolah, status_sekolah, nisn, tahun_lulus)
                 VALUES ('$id_pendaftaran', '$npsn', '$nama_sekolah', '$status_sekolah', '$nisn', '$tahun_lulus')";
  $result_insert = mysqli_query($conn, $sql_insert);

  // Cek apakah operasi berhasil
  if ($result_insert) {
    echo "Pengajuan data sekolah berhasil.";
    // Redirect ke halaman selanjutnya
    header("Location: jmr.php");
    exit();
  } else {
    echo "Terjadi kesalahan saat mengajukan data sekolah.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JMR - Data Sekolah</title>
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
                            <span>Daya Tampung Maba <br>2023</span>
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
  <p class="judul">Entry Data Sekolah SMA/MA/SMK</p>
  <form method="post" action="" onsubmit="return confirmSubmit()">
    <label for="id_pendaftaran">Id Pendaftaran:</label>
    <input type="text" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" disabled>
    <br>
    <label for="nama">Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>" disabled>
    <br>
    <label for="npsn">NPSN:</label>
    <input type="text" name="npsn" required>
    <br>
    <label for="nama_sekolah">Nama Sekolah:</label>
    <input type="text" name="nama_sekolah" required>
    <br>
    <label for="status_sekolah">Status Sekolah:</label>
    <input type="radio" name="status_sekolah" value="negeri" required> Negeri
    <input type="radio" name="status_sekolah" value="swasta" required> Swasta
    <br>
    <label for="nisn">NISN:</label>
    <input type="text" name="nisn" required>
    <br>
    <label for="tahun_lulus">Tahun Lulus:</label>
    <input type="radio" name="tahun_lulus" value="2021" required> 2021
    <input type="radio" name="tahun_lulus" value="2022" required> 2022
    <input type="radio" name="tahun_lulus" value="2023" required> 2023
    <br>
    <input type="submit" value="Submit">
  </form>
  </div>

  <script>
    function confirmSubmit() {
      var confirmation = confirm("\nApakah Anda sudah yakin?\n\nCatatan: Setelah Anda melakukan submit, data yang Anda input tidak dapat diubah lagi");
      if (confirmation) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</body>

</html>