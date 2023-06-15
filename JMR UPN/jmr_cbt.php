<?php
session_start();

// Periksa apakah pengguna telah login dan memiliki peran "user"
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

// Koneksi ke database
require_once 'koneksi.php';
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Mendapatkan data pengguna
$id_pendaftaran = $_SESSION['username'];

// Query untuk mendapatkan nama pengguna dan program studi pilihan
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

// Mendapatkan lokasi CBT secara random
$lokasi_cbt = generateRandomLocation($conn);

// Memproses data saat form pengajuan dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Insert data ke tabel jmr_cbt
    $sql_insert = "INSERT INTO jmr_cbt (id_pendaftaran, lokasi_cbt)
                   VALUES ('$id_pendaftaran', '$lokasi_cbt')";
    $result_insert = mysqli_query($conn, $sql_insert);

    // Cek apakah operasi berhasil
    if ($result_insert) {
        echo "Pengajuan CBT berhasil.";
        generatePDF($nama, $id_pendaftaran, $prodi1, $prodi2, $lokasi_cbt);
    } else {
        echo "Terjadi kesalahan saat mengajukan CBT.";
    }
}

// Fungsi untuk menghasilkan lokasi CBT secara random
function generateRandomLocation($conn)
{
    // Query to retrieve all locations from the lokasi_cbt table
    $sql_locations = "SELECT Gedung, Ruangan FROM lokasi_cbt";
    $result_locations = mysqli_query($conn, $sql_locations);

    // Fetch all locations into an array
    $locations = [];
    while ($row = mysqli_fetch_assoc($result_locations)) {
        $locations[] = $row['Gedung'] . ' - ' . $row['Ruangan'];
    }

    // Generate a random index
    $randomIndex = array_rand($locations);

    // Return the randomly selected location
    return $locations[$randomIndex];
}

// Fungsi untuk menghasilkan PDF kartu ujian
function generatePDF($nama, $id_pendaftaran, $prodi1, $prodi2, $lokasi_cbt)
{
    $html = '
    <html>
    <head>
        <title>Kartu Ujian CBT</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            h2 {
                color: #2D4E38;
                margin-bottom: 20px;
            }
            .info {
                margin-bottom: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            .map-image {
                width: 100%;
                max-width: 500px; /* Adjust the max-width as per your preference */
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <h2>Kartu Ujian CBT</h2>
        <div class="info">
            <table>
                <tr>
                    <th>Nama</th>
                    <td>' . $nama . '</td>
                </tr>
                <tr>
                    <th>ID Pendaftaran</th>
                    <td>' . $id_pendaftaran . '</td>
                </tr>
                <tr>
                    <th>Program Studi 1</th>
                    <td>' . $prodi1 . '</td>
                </tr>
                <tr>
                    <th>Program Studi 2</th>
                    <td>' . $prodi2 . '</td>
                </tr>
                <tr>
                    <th>Lokasi CBT</th>
                    <td>' . $lokasi_cbt . '</td>
                </tr>
            </table>
        </div>
    </body>
    </html>    
    ';

    // Membuat objek Dompdf
    $dompdf = new Dompdf();

    // Memuat HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Menyetel ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'portrait');

    // Merender HTML menjadi PDF
    $dompdf->render();

    // Mendapatkan output PDF sebagai string
    $output = $dompdf->output();

    // Menyimpan PDF ke file
    $pdfFilePath = $id_pendaftaran . '.pdf';
    file_put_contents($pdfFilePath, $output);

    // Mengirimkan file PDF ke browser
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="kartu_ujian_' . $id_pendaftaran . '.pdf"');
    readfile($pdfFilePath);
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
    <p class="judul">Cetak Kartu Ujian CBT</p>
    <form method="post" action="" onsubmit="return confirmSubmit()">
        <button type="submit">submit</button>
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