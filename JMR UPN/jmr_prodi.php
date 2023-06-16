<?php
session_start();

// Periksa apakah pengguna telah login dan memiliki peran "user"
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
  header('Location: login.php');
  exit();
}

// Koneksi ke database
require_once 'koneksi.php';

// Query untuk mendapatkan daftar program studi dari tabel jurusan
$sql = "SELECT * FROM jurusan";
$result = mysqli_query($conn, $sql);
$jurusanOptions = '';
while ($row = mysqli_fetch_assoc($result)) {
  $jurusanOptions .= '<option value="' . $row['jurusan_id'] . '">' . $row['prodi'] . '</option>';
}

// Mendapatkan data pengguna
$id_pendaftaran = $_SESSION['username'];

// Query untuk mendapatkan nama pengguna berdasarkan id_pendaftaran
$sql_pengguna = "SELECT nama FROM users WHERE id_pendaftaran = '$id_pendaftaran'";
$result_pengguna = mysqli_query($conn, $sql_pengguna);
$row_pengguna = mysqli_fetch_assoc($result_pengguna);
$nama = $row_pengguna['nama'];

// Memproses data saat form pengajuan dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $program_studi1 = $_POST['program_studi1'];
  $program_studi2 = $_POST['program_studi2'];

  // Memproses data saat form pengajuan dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $program_studi1 = $_POST['program_studi1'];
    $program_studi2 = $_POST['program_studi2'];

    // Lakukan operasi yang diperlukan dengan data program studi yang dipilih
    // ...

    // Insert data ke tabel jmr_programstudi
    $sql_insert = "INSERT INTO jmr_programstudi (id_pendaftaran, program_studi1, program_studi2)
                 VALUES ('$id_pendaftaran', '$program_studi1', '$program_studi2')";
    $result_insert = mysqli_query($conn, $sql_insert);

    // Cek apakah operasi berhasil
    if ($result_insert) {
      echo "Pengajuan program studi berhasil.";
      header("Location: jmr.php");
    } else {
      echo "Terjadi kesalahan saat mengajukan program studi.";
    }
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JMR - Pilihan Prodi</title>
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
      <span class="logo_name">JMR UPN</span>
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
    <p class="judul">Memilih Program Studi</p>
    <form method="post" action="" onsubmit="return confirmSubmit()">
      <label for="id_pendaftaran">Id Pendaftaran:</label>
      <input type="text" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" disabled>
      <br>
      <label for="nama">Nama:</label>
      <input type="text" name="nama" value="<?php echo $nama; ?>" disabled>
      <br>
      <label for="program_studi1">Program Studi Pilihan 1:</label>
      <select name="program_studi1" required>
        <option value="">Pilih Program Studi</option>
        <?php echo $jurusanOptions; ?>
      </select>
      <br>
      <label for="program_studi2">Program Studi Pilihan 2:</label>
      <select name="program_studi2" required>
        <option value="">Pilih Program Studi</option>
        <?php echo $jurusanOptions; ?>
      </select>
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