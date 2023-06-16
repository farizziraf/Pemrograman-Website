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

// Query untuk mendapatkan data pengguna berdasarkan id_pendaftaran
$sql_pengguna = "SELECT users.nama, users.nomor_telepon, j1.prodi AS program_studi1, j2.prodi AS program_studi2
                 FROM users
                 INNER JOIN jmr_programstudi ON users.id_pendaftaran = jmr_programstudi.id_pendaftaran
                 INNER JOIN jurusan j1 ON jmr_programstudi.program_studi1 = j1.jurusan_id
                 INNER JOIN jurusan j2 ON jmr_programstudi.program_studi2 = j2.jurusan_id
                 WHERE users.id_pendaftaran = '$id_pendaftaran'";
$result_pengguna = mysqli_query($conn, $sql_pengguna);
$row_pengguna = mysqli_fetch_assoc($result_pengguna);
$nama = $row_pengguna['nama'];
$nomor_telepon = $row_pengguna['nomor_telepon'];
$prodi1 = $row_pengguna['program_studi1'];
$prodi2 = $row_pengguna['program_studi2'];


// Memproses data saat form pengajuan dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mendapatkan data dari form
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat_asal = $_POST['alamat_asal'];
  $kota_kabupaten = $_POST['kota_kabupaten'];
  $kode_pos = $_POST['kode_pos'];
  $kelamin = $_POST['kelamin'];
  $agama = $_POST['agama'];
  $nama_orangtua = $_POST['nama_orangtua_wali'];
  $alamat_orangtua = $_POST['alamat_orangtua_wali'];
  $nomor_telepon_orangtua = $_POST['nomor_telepon_orangtua_wali'];
  $pekerjaan_orangtua = $_POST['pekerjaan_orangtua_wali'];
  $penghasilan_orangtua = $_POST['penghasilan_orangtua_wali'];

  // Mendapatkan ekstensi file
  $extension = pathinfo($_FILES['foto_diri']['name'], PATHINFO_EXTENSION);

  // Menentukan nama file baru dengan menggunakan id_pendaftaran
  $new_filename = $id_pendaftaran . '.' . $extension;

  // Menentukan path lengkap untuk penyimpanan
  $target_path = 'Assets\\jmr_fotodiri\\' . $new_filename;

  // Menyimpan file foto ke path yang ditentukan
  move_uploaded_file($_FILES['foto_diri']['tmp_name'], $target_path);

  // Insert data ke tabel jmr_biodata
  $sql_insert = "INSERT INTO jmr_biodata (id_pendaftaran, foto_diri, nama, tempat_lahir, tanggal_lahir, alamat_asal, kota_kabupaten, kode_pos, kelamin, agama, nama_orangtua_wali, alamat_orangtua_wali, nomor_telepon_orangtua_wali, pekerjaan_orangtua_wali, penghasilan_orangtua_wali)
                 VALUES ('$id_pendaftaran', '$new_filename', '$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat_asal', '$kota_kabupaten', '$kode_pos', '$kelamin', '$agama', '$nama_orangtua', '$alamat_orangtua', '$nomor_telepon_orangtua', '$pekerjaan_orangtua', '$penghasilan_orangtua')";
  $result_insert = mysqli_query($conn, $sql_insert);

  // Cek apakah operasi berhasil
  if ($result_insert) {
    echo "Data biodata berhasil disimpan.";
    header("Location: jmr.php");
    exit();
  } else {
    echo "Terjadi kesalahan saat menyimpan data biodata.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JMR - Biodata</title>
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
    <p class="judul">Entry Biodata</p>
    <form method="post" action="" enctype="multipart/form-data" onsubmit="return confirmSubmit()">
      <label for="id_pendaftaran">Id Pendaftaran:</label>
      <input type="text" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" disabled>
      <br>
      <label for="foto_diri">Foto Diri:</label>
      <input type="file" name="foto_diri" id="foto_diri" required onchange="previewFoto(event)">
      <br>
      <label for="foto_preview">Foto Preview:</label>
      <img id="preview_foto" src="#" alt="Preview Foto" style="display: none;">
      <br>
      <label for="nama">Nama:</label>
      <input type="text" name="nama" value="<?php echo $nama; ?>" disabled>
      <br>
      <label for="pilihan_prodi1">Pilihan Program Studi 1:</label>
      <input type="text" name="pilihan_prodi1" value="<?php echo $prodi1; ?>" disabled>
      <br>
      <label for="pilihan_prodi2">Pilihan Program Studi 2:</label>
      <input type="text" name="pilihan_prodi2" value="<?php echo $prodi2; ?>" disabled>
      <br>
      <label for="tempat_lahir">Tempat Lahir:</label>
      <input type="text" name="tempat_lahir" required>
      <br>
      <label for="tanggal_lahir">Tanggal Lahir:</label>
      <input type="date" name="tanggal_lahir" required>
      <br>
      <label for="alamat_asal">Alamat Asal:</label>
      <input type="text" name="alamat_asal" required>
      <br>
      <label for="kota_kabupaten">Kota / Kabupaten:</label>
      <input type="text" name="kota_kabupaten" required>
      <br>
      <label for="kode_pos">Kode Pos:</label>
      <input type="text" name="kode_pos" required>
      <br>
      <label for="nomor_telepon">Nomor Telepon:</label>
      <input type="text" name="nomor_telepon" value="<?php echo $nomor_telepon; ?>" disabled>
      <br>
      <label for="kelamin">Jenis Kelamin:</label>
      <select name="kelamin" required>
        <option value="">Pilih Jenis Kelamin</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
      <br>
      <label for="agama">Agama:</label>
      <select name="agama" required>
        <option value="">Pilih Agama</option>
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Katolik">Katolik</option>
        <option value="Buddha">Buddha</option>
        <option value="Hindu">Hindu</option>
        <option value="Khonghucu">Khonghucu</option>
      </select>
      <br>
      <label for="nama_orangtua_wali">Nama Orangtua/Wali:</label>
      <input type="text" name="nama_orangtua_wali" required>
      <br>
      <label for="alamat_orangtua_wali">Alamat Orangtua/Wali:</label>
      <input type="text" name="alamat_orangtua_wali" required>
      <br>
      <label for="nomor_telepon_orangtua_wali">Nomor Telepon Orangtua/Wali:</label>
      <input type="text" name="nomor_telepon_orangtua_wali" required>
      <br>
      <label for="pekerjaan_orangtua_wali">Pekerjaan Orangtua/Wali:</label>
      <input type="text" name="pekerjaan_orangtua_wali" required>
      <br>
      <label for="penghasilan_orangtua_wali">Penghasilan Orangtua/Wali:</label>
      <select name="penghasilan_orangtua_wali" required>
        <option value="">Pilih Penghasilan Orangtua/Wali</option>
        <option value="0">0</option>
        <option value="≤ 500.000">≤ 500.000</option>
        <option value="500.000 < - ≤ 2.000.000">500.000 < - ≤ 2.000.000</option>
        <option value="2.000.000 < - ≤ 3.500.000">2.000.000 < - ≤ 3.500.000</option>
        <option value="3.500.000 < - ≤ 5.000.000">3.500.000 < - ≤ 5.000.000</option>
        <option value="5.000.000 < - ≤ 10.000.000">5.000.000 < - ≤ 10.000.000</option>
        <option value="10.000.000 < - ≤ 20.000.000">10.000.000 < - ≤ 20.000.000</option>
        <option value="20.000.000 < - ≤ 30.000.000">20.000.000 < - ≤ 30.000.000</option>
        <option value="> 30.000.000">> 30.000.000</option>
      </select>
      <br>
      <input type="submit" value="Simpan">
    </form>
  </div>

  <script>
    function previewFoto(event) {
      var input = event.target;
      var reader = new FileReader();

      reader.onload = function () {
        var dataURL = reader.result;
        var previewFoto = document.getElementById('preview_foto');

        previewFoto.src = dataURL;
        previewFoto.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]);
    }
  </script>
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