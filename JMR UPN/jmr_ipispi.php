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

// Query untuk mendapatkan nama pengguna, prodi 1, dan prodi 2 berdasarkan id_pendaftaran
$sql_pengguna = "SELECT users.nama, j1.prodi AS program_studi1, j2.prodi AS program_studi2
                 FROM users
                 INNER JOIN jmr_programstudi ON users.id_pendaftaran = jmr_programstudi.id_pendaftaran
                 INNER JOIN jurusan j1 ON jmr_programstudi.program_studi1 = j1.jurusan_id
                 INNER JOIN jurusan j2 ON jmr_programstudi.program_studi2 = j2.jurusan_id
                 WHERE users.id_pendaftaran = '$id_pendaftaran'";
$result_pengguna = mysqli_query($conn, $sql_pengguna);
$row_pengguna = mysqli_fetch_assoc($result_pengguna);
$nama = $row_pengguna['nama'];
$prodi1 = $row_pengguna['program_studi1'];
$prodi2 = $row_pengguna['program_studi2'];

// Memproses data saat form pengajuan dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ipi_spi1 = $_POST['ipi_spi1'];
    $ipi_spi2 = $_POST['ipi_spi2'];

    // Mendapatkan ekstensi file
    $extension = pathinfo($_FILES['surat_pernyataaan']['name'], PATHINFO_EXTENSION);

    // Menentukan nama file baru dengan menggunakan id_pendaftaran
    $new_filename = $id_pendaftaran . '.' . $extension;

    // Menentukan path lengkap untuk penyimpanan
    $target_path = 'Assets/jmr_ipispi/' . $new_filename;

    // Menyimpan file surat pernyataan ke path yang ditentukan
    move_uploaded_file($_FILES['surat_pernyataaan']['tmp_name'], $target_path);

    // Insert data ke tabel jmr_ipispi
    $sql_insert = "INSERT INTO jmr_ipispi (id_pendaftaran, ipispi1, ipispi2, sp_ipispi)
                   VALUES ('$id_pendaftaran', '$ipi_spi1', '$ipi_spi2', '$new_filename')";
    $result_insert = mysqli_query($conn, $sql_insert);

    // Cek apakah operasi berhasil
    if ($result_insert) {
        echo "Pengajuan IPI/SPI berhasil.";
        header("Location: jmr.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengajukan IPI/SPI.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JMR - IPISPI</title>
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
<<<<<<< HEAD
                        <a href="Salinan_Kep_Rektor_Daya_Tampung_Awal_Mahasiswa_Baru_Program_Sarjana_UPNV_Jawa_Timur_Tahun_2023.pdf"
                            class="link flex">
                            <i class="bx bxs-file-pdf"></i>
                            <span>Daya Tampung Maba <br>2023</span>
=======
                        <a href="Salinan_Kep_Rektor_Daya_Tampung_Awal_Mahasiswa_Baru_Program_Sarjana_UPNV_Jawa_Timur_Tahun_2023.pdf" class="link flex">
                            <i class="bx bxs-file-pdf"></i>
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

<<<<<<< HEAD
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
        <p class="judul">Entry IPI/SPI</p>
        <form method="post" action="" enctype="multipart/form-data" onsubmit="return confirmSubmit()">
            <label for="id_pendaftaran">Id Pendaftaran:</label>
            <input type="text" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" disabled>
            <br>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $nama; ?>" disabled>
            <br>
            <label for="prodi1">Pilihan Prodi 1:</label>
            <input type="text" name="prodi1" value="<?php echo $prodi1; ?>" disabled>
            <br>
            <label for="ipi_spi1">IPI/SPI Pilihan 1:</label>
            <select name="ipi_spi1" required>
                <option value="">Pilih IPI/SPI</option>
                <option value="0">0</option>
                <option value="15000000">15.000.000</option>
                <option value="30000000">30.000.000</option>
                <option value="45000000">45.000.000</option>
                <option value="60000000">60.000.000</option>
                <option value="75000000">75.000.000</option>
                <option value="90000000">90.000.000</option>
            </select>
            <br>
            <label for="prodi2">Pilihan Prodi 2:</label>
            <input type="text" name="prodi2" value="<?php echo $prodi2; ?>" disabled>
            <br>
            <label for="ipi_spi2">IPI/SPI Pilihan 2:</label>
            <select name="ipi_spi2" required>
                <option value="">Pilih IPI/SPI</option>
                <option value="0">0</option>
                <option value="15000000">15.000.000</option>
                <option value="30000000">30.000.000</option>
                <option value="45000000">45.000.000</option>
                <option value="60000000">60.000.000</option>
                <option value="75000000">75.000.000</option>
                <option value="90000000">90.000.000</option>
            </select>
            <br><br>
            <a href="download_file.php">Download File PDF</a>
            <br><br>
            <label for="surat_pernyataaan">Upload Surat Pernyataan:</label>
            <input type="file" name="surat_pernyataaan" required>
            <br><br>
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
=======
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
  <p class="judul">Entry IPI/SPI</p>
  <form method="post" action="" enctype="multipart/form-data" onsubmit="return confirmSubmit()">
        <label for="id_pendaftaran">Id Pendaftaran:</label>
        <input type="text" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" disabled>
        <br>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>" disabled>
        <br>
        <label for="prodi1">Pilihan Prodi 1:</label>
        <input type="text" name="prodi1" value="<?php echo $prodi1; ?>" disabled>
        <br>
        <label for="ipi_spi1">IPI/SPI Pilihan 1:</label>
        <select name="ipi_spi1" required>
            <option value="">Pilih IPI/SPI</option>
            <option value="0">0</option>
            <option value="15000000">15.000.000</option>
            <option value="30000000">30.000.000</option>
            <option value="45000000">45.000.000</option>
            <option value="60000000">60.000.000</option>
            <option value="75000000">75.000.000</option>
            <option value="90000000">90.000.000</option>
        </select>
        <br>
        <label for="prodi2">Pilihan Prodi 2:</label>
        <input type="text" name="prodi2" value="<?php echo $prodi2; ?>" disabled>
        <br>
        <label for="ipi_spi2">IPI/SPI Pilihan 2:</label>
        <select name="ipi_spi2" required>
            <option value="">Pilih IPI/SPI</option>
            <option value="0">0</option>
            <option value="15000000">15.000.000</option>
            <option value="30000000">30.000.000</option>
            <option value="45000000">45.000.000</option>
            <option value="60000000">60.000.000</option>
            <option value="75000000">75.000.000</option>
            <option value="90000000">90.000.000</option>
        </select>
        <br><br>
        <a href="download_file.php">Download File PDF</a>
        <br><br>
        <label for="surat_pernyataaan">Upload Surat Pernyataan:</label>
        <input type="file" name="surat_pernyataaan" required>
        <br><br>
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
>>>>>>> 8db55c665defb29a2de05acaa32d84c81b77c128
