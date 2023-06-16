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

// Query untuk mendapatkan nama pengguna dan program studi pilihan dari tabel users
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
    $kelas_10_smt1 = $_POST['kelas_10_smt1'];
    $kelas_10_smt2 = $_POST['kelas_10_smt2'];
    $kelas_11_smt1 = $_POST['kelas_11_smt1'];
    $kelas_11_smt2 = $_POST['kelas_11_smt2'];
    $kelas_12_smt1 = $_POST['kelas_12_smt1'];

    // Insert data ke tabel jmr_raport
    $sql_insert = "INSERT INTO jmr_raport (id_pendaftaran, kelas_10_smt1, kelas_10_smt2, kelas_11_smt1, kelas_11_smt2, kelas_12_smt1)
                 VALUES ('$id_pendaftaran', '$kelas_10_smt1', '$kelas_10_smt2', '$kelas_11_smt1', '$kelas_11_smt2', '$kelas_12_smt1')";
    $result_insert = mysqli_query($conn, $sql_insert);

    // Cek apakah operasi berhasil
    if ($result_insert) {
        echo "Pengajuan nilai raport berhasil.";
        header("Location: jmr.php");
    } else {
        echo "Terjadi kesalahan saat mengajukan nilai raport.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JMR - Raport</title>
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
                        <a href="Salinan_Kep_Rektor_Daya_Tampung_Awal_Mahasiswa_Baru_Program_Sarjana_UPNV_Jawa_Timur_Tahun_2023.pdf"
                            class="link flex">
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
        <p class="judul">Entry Rata-rata Nilai Raport</p>
        <form method="post" action="" onsubmit="return confirmSubmit()">
            <label for="id_pendaftaran">Id Pendaftaran:</label>
            <input type="text" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" disabled>
            <br>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $nama; ?>" disabled>
            <br>
            <label for="program_studi1">Program Studi Pilihan 1:</label>
            <input type="text" name="program_studi1" value="<?php echo $prodi1; ?>" disabled>
            <br>
            <label for="program_studi2">Program Studi Pilihan 2:</label>
            <input type="text" name="program_studi2" value="<?php echo $prodi2; ?>" disabled>
            <br>
            <label for="kelas_10_smt1">Rata-rata Nilai Raport Kelas 10 Semester 1:</label>
            <input type="number" name="kelas_10_smt1" step="0.01" required>
            <br>
            <label for="kelas_10_smt2">Rata-rata Nilai Raport Kelas 10 Semester 2:</label>
            <input type="number" name="kelas_10_smt2" step="0.01" required>
            <br>
            <label for="kelas_11_smt1">Rata-rata Nilai Raport Kelas 11 Semester 1:</label>
            <input type="number" name="kelas_11_smt1" step="0.01" required>
            <br>
            <label for="kelas_11_smt2">Rata-rata Nilai Raport Kelas 11 Semester 2:</label>
            <input type="number" name="kelas_11_smt2" step="0.01" required>
            <br>
            <label for="kelas_12_smt1">Rata-rata Nilai Raport Kelas 12 Semester 1:</label>
            <input type="number" name="kelas_12_smt1" step="0.01" required>
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