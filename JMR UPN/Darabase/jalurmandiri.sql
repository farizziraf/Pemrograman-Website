-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 09:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jalurmandiri`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$shCD2v6hb/Ju6t/JpVqXqOLHtmcQG83U8FHQSIuDw26nBw3bBL.9C');

-- --------------------------------------------------------

--
-- Table structure for table `jmr_biodata`
--

CREATE TABLE `jmr_biodata` (
  `jmr_biodata_id` int(11) NOT NULL,
  `id_pendaftaran` varchar(11) NOT NULL,
  `foto_diri` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_asal` varchar(100) NOT NULL,
  `kota_kabupaten` varchar(50) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `nama_orangtua_wali` varchar(50) NOT NULL,
  `alamat_orangtua_wali` varchar(100) NOT NULL,
  `nomor_telepon_orangtua_wali` varchar(15) NOT NULL,
  `pekerjaan_orangtua_wali` varchar(50) NOT NULL,
  `penghasilan_orangtua_wali` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jmr_biodata`
--

INSERT INTO `jmr_biodata` (`jmr_biodata_id`, `id_pendaftaran`, `foto_diri`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat_asal`, `kota_kabupaten`, `kode_pos`, `kelamin`, `agama`, `nama_orangtua_wali`, `alamat_orangtua_wali`, `nomor_telepon_orangtua_wali`, `pekerjaan_orangtua_wali`, `penghasilan_orangtua_wali`) VALUES
(1, '2301000001', '2301000001.png', 'Fariz', 'Jeddah', '2003-05-31', 'Jl. Kalimantan no.127 GKB', 'Gresik', '61151', 'L', 'Islam', 'Mohamad Derajad', 'Jl. Kalimantan no.127 GKB', '085236427343', 'wiraswasta', '3.500.000 < - ≤ 5.000.000'),
(2, '2301000002', '2301000002.jpg', 'Ahfaitar Abdil Hakim', 'Jakarta', '2004-08-10', 'Jl. Merdeka No. 123', 'Jakarta Pusat', '12345', 'L', 'Islam', 'Budi Santoso', 'Jl. Merdeka No. 123', '08123456789', 'Wiraswasta', '5.000.000 < - ≤ 10.000.000'),
(3, '2301000003', '2301000003.jpg', 'Budi Prasetyo', 'surabaya', '2003-02-10', 'Jl. Ahmad Yani No. 78', 'surabaya', '67890', 'L', 'Kristen', 'Susilo Wijaya', 'Jl. Ahmad Yani No. 78', '082345612378', 'Wiraswasta', '5.000.000 < - ≤ 10.000.000'),
(4, '2301000004', '2301000004.jpg', 'Dewi Rahayu', 'Bandung', '2004-05-28', 'Jl. Merdeka No. 56', 'Bandung', '12345', 'P', 'Hindu', 'Siti Nurhayati', 'Jl. Merdeka No. 56', '087712345678', 'Pegawai Swasta', '3.500.000 < - ≤ 5.000.000'),
(5, '2301000005', '2301000005.jpg', 'Rudi Setiawan', 'Yogyakarta', '2004-11-12', 'Jl. Jendral Sudirman No. 100', 'Yogyakarta', '54321', 'L', 'Islam', 'Siti Rahayu', 'Jl. Jendral Sudirman No. 100', '081876543210', 'PNS', '2.000.000 < - ≤ 3.500.000'),
(6, '2301000006', '2301000006.jpg', 'Siti Nurhayati', 'Bandung', '2005-10-05', 'Jl. Pahlawan No. 10', 'Bandung', '67890', 'P', 'Kristen', 'Martin Agustin', 'Jl. Pahlawan No. 10', '082345678123', 'Wiraswasta', '2.000.000 < - ≤ 3.500.000'),
(7, '2301000007', '2301000007.jpg', 'Rina Permata Sari', 'Jakarta', '2005-04-15', 'Jl. Melati No. 20', 'Jakarta Selatan', '12345', 'P', 'Katolik', 'Christiano Stephanus', 'Jl. Melati No. 20', '081234567812', 'Wiraswasta', '5.000.000 < - ≤ 10.000.000'),
(8, '2301000008', '2301000008.jpg', 'Budi Santoso', 'Surabaya', '2004-08-10', 'Jl. Pahlawan No. 50', 'Surabaya', '54321', 'L', 'Islam', 'Ahmad Santoso', 'Jl. Pahlawan No. 50', '087654321012', 'Polisi', '5.000.000 < - ≤ 10.000.000'),
(9, '2301000009', '2301000009.jpg', 'Rizky Setiawan', 'Surabaya', '2005-02-01', 'Jl. Raya Barat No. 10', 'Surabaya', '54321', 'L', 'Islam', 'Muhammad Bani', 'Jl. Raya Barat No. 10', '081234567812', 'Wiraswasta', '3.500.000 < - ≤ 5.000.000'),
(10, '2301000010', '2301000010.jpg', 'Siti Nurhayati', 'sidoarjo', '2005-03-08', 'Jl. Merdeka Timur No. 15', 'sidoarjo', '12345', 'P', 'Islam', 'Ahmad Hidayat', 'Jl. Merdeka Timur No. 15', '081234567812', 'Karyawan Swasta', '2.000.000 < - ≤ 3.500.000'),
(11, '2301000011', '2301000011.jpg', 'Ahmad Fauzi', 'Surabaya', '2004-11-15', 'Jl. Merdeka Selatan No. 20', 'Surabaya', '54321', 'L', 'Islam', 'Siti Rahmah', 'Jl. Merdeka Selatan No. 20', '081234567812', 'Wiraswasta', '3.500.000 < - ≤ 5.000.000'),
(12, '2301000012', '2301000012.jpg', 'Dian Permata Sari', 'Gresik', '2005-02-17', 'Jl. Merdeka Barat No. 25', 'Gresik', '54321', 'P', 'Islam', 'Lukman Rahmaddani', 'Jl. Merdeka Barat No. 25', '081234567812', 'Arsitek', '10.000.000 < - ≤ 20.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `jmr_cbt`
--

CREATE TABLE `jmr_cbt` (
  `cbt_id` int(11) NOT NULL,
  `id_pendaftaran` varchar(11) NOT NULL,
  `lokasi_cbt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jmr_cbt`
--

INSERT INTO `jmr_cbt` (`cbt_id`, `id_pendaftaran`, `lokasi_cbt`) VALUES
(1, '2301000001', 'GKB 1 - Lab Kom 2 - Lantai 1 GKB 1'),
(2, '2301000002', 'Fakultas Teknik - Laboratorium Statistik - Lantai 2 FT'),
(3, '2301000003', 'GKB 2 - FEB - Lab Kom 1.2 - Lantai 2 GKB 2 - FEB'),
(4, '2301000004', 'Fakultas Ekonomi & Bisnis - Laboratorium Akuntansi - Lantai 2 FEB 2'),
(5, '2301000005', 'Fakultas Ekonomi & Bisnis - Laboratorium Terpadu 1 - Lantai 2 FEB 1'),
(6, '2301000006', 'Fakultas Teknik - Laboratorium Statistik - Lantai 2 FT'),
(7, '2301000007', 'Fakultas Ilmu Komputer - Laboratorium PTI - Lantai 2 FIK'),
(8, '2301000008', 'PUSKOM - Laboratorium Puskom - Lantai 1'),
(9, '2301000009', 'Fakultas Ilmu Komputer - Laboratorium Solusi - Lantai 2 FIK'),
(10, '2301000010', 'Fakultas Ilmu Komputer - Laboratorium Sains Data - Lantai 2 FIK'),
(11, '2301000011', 'Fakultas Ekonomi & Bisnis - Laboratorium Terpadu 2 - Lantai 2 FEB 1'),
(12, '2301000012', 'GKB 1 - Lab Kom 3 - Lantai 1 GKB 1');

-- --------------------------------------------------------

--
-- Table structure for table `jmr_datasekolah`
--

CREATE TABLE `jmr_datasekolah` (
  `jmr_datasekolah_id` int(11) NOT NULL,
  `id_pendaftaran` varchar(11) NOT NULL,
  `npsn` varchar(10) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `status_sekolah` varchar(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `tahun_lulus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jmr_datasekolah`
--

INSERT INTO `jmr_datasekolah` (`jmr_datasekolah_id`, `id_pendaftaran`, `npsn`, `nama_sekolah`, `status_sekolah`, `nisn`, `tahun_lulus`) VALUES
(1, '2301000001', '1234567890', 'SMA Muhammadiyah 10 GKB', 'swasta', '98765432109876543210', 2021),
(2, '2301000002', '12345678', 'SMA Negeri 1 Jakarta', 'negeri', '1234567890', 2023),
(3, '2301000003', '98765432', 'SMA Negeri 2 Surabaya', 'negeri', '9876543210', 2021),
(4, '2301000004', '56789123', 'SMA Negeri 3 Bandung', 'negeri', '5678901234', 2022),
(5, '2301000005', '43218765', 'SMA Negeri 4 Yogyakarta', 'negeri', '4321876543', 2022),
(6, '2301000006', '89012345', 'SMA Negeri 5 Bandung', 'negeri', '8901234567', 2023),
(7, '2301000007', '54321098', 'SMA Negeri 6 Jakarta', 'negeri', '5432109876', 2023),
(8, '2301000008', '54321098', 'SMA Negeri 7 Surabaya', 'negeri', '5432109876', 2023),
(9, '2301000009', '54321098', 'SMA Negeri 5 Bandung', 'negeri', '5432109876', 2023),
(10, '2301000010', '54321098', 'SMA Negeri 17 Surabaya', 'negeri', '5432109876', 2023),
(11, '2301000011', '54321098', 'SMA Negeri 2 Surabaya', 'negeri', '5432109876', 2023),
(12, '2301000012', '54321098', 'SMA Muhammadiyah 1 Gresik', 'swasta', '5432109876', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `jmr_ipispi`
--

CREATE TABLE `jmr_ipispi` (
  `ipispi_id` int(11) NOT NULL,
  `id_pendaftaran` varchar(11) NOT NULL,
  `ipispi1` int(11) NOT NULL,
  `ipispi2` int(11) NOT NULL,
  `sp_ipispi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jmr_ipispi`
--

INSERT INTO `jmr_ipispi` (`ipispi_id`, `id_pendaftaran`, `ipispi1`, `ipispi2`, `sp_ipispi`) VALUES
(1, '2301000001', 15000000, 15000000, '2301000001.pdf'),
(2, '2301000002', 30000000, 45000000, '2301000002.pdf'),
(3, '2301000003', 60000000, 75000000, '2301000003.pdf'),
(4, '2301000004', 15000000, 15000000, '2301000004.pdf'),
(5, '2301000005', 30000000, 15000000, '2301000005.pdf'),
(6, '2301000006', 30000000, 30000000, '2301000006.pdf'),
(7, '2301000007', 45000000, 15000000, '2301000007.pdf'),
(8, '2301000008', 60000000, 30000000, '2301000008.pdf'),
(9, '2301000009', 15000000, 15000000, '2301000009.pdf'),
(10, '2301000010', 30000000, 15000000, '2301000010.pdf'),
(11, '2301000011', 30000000, 15000000, '2301000011.pdf'),
(12, '2301000012', 60000000, 30000000, '2301000012.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jmr_nilaipendukung1`
--

CREATE TABLE `jmr_nilaipendukung1` (
  `jmr_nilaipendukung1_id` int(11) NOT NULL,
  `id_pendaftaran` varchar(11) NOT NULL,
  `mata_pelajaran` varchar(20) NOT NULL,
  `kelas_10_smt1` decimal(4,2) DEFAULT NULL,
  `kelas_10_smt2` decimal(4,2) DEFAULT NULL,
  `kelas_11_smt1` decimal(4,2) DEFAULT NULL,
  `kelas_11_smt2` decimal(4,2) DEFAULT NULL,
  `kelas_12_smt1` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jmr_nilaipendukung1`
--

INSERT INTO `jmr_nilaipendukung1` (`jmr_nilaipendukung1_id`, `id_pendaftaran`, `mata_pelajaran`, `kelas_10_smt1`, `kelas_10_smt2`, `kelas_11_smt1`, `kelas_11_smt2`, `kelas_12_smt1`) VALUES
(1, '2301000001', 'Matematika', '80.00', '80.00', '80.00', '80.00', '80.00'),
(2, '2301000002', 'Matematika', '82.50', '84.30', '86.10', '88.00', '89.50'),
(3, '2301000003', 'Kimia', '78.90', '81.20', '85.50', '88.00', '90.50'),
(4, '2301000004', 'Biologi', '81.50', '84.00', '87.00', '89.50', '92.00'),
(5, '2301000005', 'Kimia', '79.20', '82.10', '85.70', '88.40', '90.80'),
(6, '2301000006', 'Biologi', '80.80', '83.20', '87.00', '89.50', '91.80'),
(7, '2301000007', 'Matematika', '82.50', '85.30', '88.00', '90.50', '92.30'),
(8, '2301000008', 'Ekonomi', '85.50', '88.20', '89.70', '91.40', '93.10'),
(9, '2301000009', 'Kimia', '85.20', '87.50', '89.10', '91.00', '93.50'),
(10, '2301000010', 'Ekonomi', '82.40', '85.10', '88.30', '90.10', '92.30'),
(11, '2301000011', 'Matematika', '85.00', '87.50', '89.00', '91.00', '93.00'),
(12, '2301000012', 'Sosiologi', '88.00', '90.50', '92.00', '93.50', '95.00');

-- --------------------------------------------------------

--
-- Table structure for table `jmr_nilaipendukung2`
--

CREATE TABLE `jmr_nilaipendukung2` (
  `jmr_nilaipendukung2_id` int(11) NOT NULL,
  `id_pendaftaran` varchar(11) NOT NULL,
  `mata_pelajaran` varchar(20) NOT NULL,
  `kelas_10_smt1` decimal(4,2) DEFAULT NULL,
  `kelas_10_smt2` decimal(4,2) DEFAULT NULL,
  `kelas_11_smt1` decimal(4,2) DEFAULT NULL,
  `kelas_11_smt2` decimal(4,2) DEFAULT NULL,
  `kelas_12_smt1` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jmr_nilaipendukung2`
--

INSERT INTO `jmr_nilaipendukung2` (`jmr_nilaipendukung2_id`, `id_pendaftaran`, `mata_pelajaran`, `kelas_10_smt1`, `kelas_10_smt2`, `kelas_11_smt1`, `kelas_11_smt2`, `kelas_12_smt1`) VALUES
(1, '2301000001', 'Matematika', '80.00', '80.00', '80.00', '80.00', '80.00'),
(2, '2301000002', 'Fisika', '80.20', '82.10', '84.00', '85.80', '87.30'),
(3, '2301000003', 'Matematika', '83.40', '87.20', '89.10', '92.00', '94.50'),
(4, '2301000004', 'Matematika', '83.70', '86.50', '88.20', '90.10', '92.70'),
(5, '2301000005', 'Fisika', '82.50', '85.30', '88.00', '90.50', '92.30'),
(6, '2301000006', 'Matematika', '85.50', '88.00', '89.20', '91.00', '93.20'),
(7, '2301000007', 'Ekonomi', '88.70', '90.50', '92.00', '93.50', '95.20'),
(8, '2301000008', 'Sosiologi', '81.80', '84.50', '88.10', '90.00', '92.50'),
(9, '2301000009', 'Fisika', '82.80', '85.50', '88.20', '90.00', '92.50'),
(10, '2301000010', 'Ekonomi', '82.40', '85.10', '88.30', '90.10', '92.30'),
(11, '2301000011', 'Fisika', '83.20', '86.00', '88.30', '90.50', '92.80'),
(12, '2301000012', 'Sejarah', '85.20', '87.00', '89.20', '91.00', '94.00');

-- --------------------------------------------------------

--
-- Table structure for table `jmr_programstudi`
--

CREATE TABLE `jmr_programstudi` (
  `jmr_programstudi_id` int(11) NOT NULL,
  `id_pendaftaran` varchar(11) NOT NULL,
  `program_studi1` int(11) NOT NULL,
  `program_studi2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jmr_programstudi`
--

INSERT INTO `jmr_programstudi` (`jmr_programstudi_id`, `id_pendaftaran`, `program_studi1`, `program_studi2`) VALUES
(1, '2301000001', 13, 14),
(2, '2301000002', 12, 13),
(3, '2301000003', 5, 8),
(4, '2301000004', 25, 15),
(5, '2301000005', 6, 9),
(6, '2301000006', 22, 23),
(7, '2301000007', 15, 17),
(8, '2301000008', 3, 18),
(9, '2301000009', 6, 10),
(10, '2301000010', 2, 3),
(11, '2301000011', 8, 5),
(12, '2301000012', 19, 27);

-- --------------------------------------------------------

--
-- Table structure for table `jmr_raport`
--

CREATE TABLE `jmr_raport` (
  `jmr_raport_id` int(11) NOT NULL,
  `id_pendaftaran` varchar(11) NOT NULL,
  `kelas_10_smt1` decimal(4,2) DEFAULT NULL,
  `kelas_10_smt2` decimal(4,2) DEFAULT NULL,
  `kelas_11_smt1` decimal(4,2) DEFAULT NULL,
  `kelas_11_smt2` decimal(4,2) DEFAULT NULL,
  `kelas_12_smt1` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jmr_raport`
--

INSERT INTO `jmr_raport` (`jmr_raport_id`, `id_pendaftaran`, `kelas_10_smt1`, `kelas_10_smt2`, `kelas_11_smt1`, `kelas_11_smt2`, `kelas_12_smt1`) VALUES
(1, '2301000001', '80.00', '80.00', '80.00', '80.00', '80.00'),
(2, '2301000002', '85.50', '87.20', '88.90', '90.10', '91.80'),
(3, '2301000003', '82.30', '85.60', '87.10', '89.80', '91.20'),
(4, '2301000004', '85.20', '88.50', '87.90', '89.70', '91.30'),
(5, '2301000005', '81.80', '84.50', '87.20', '89.10', '91.50'),
(6, '2301000006', '83.50', '86.20', '88.10', '90.00', '92.50'),
(7, '2301000007', '85.60', '88.20', '89.50', '91.30', '93.80'),
(8, '2301000008', '82.30', '85.10', '87.60', '89.30', '91.90'),
(9, '2301000009', '83.50', '86.20', '88.70', '90.30', '92.80'),
(10, '2301000010', '85.30', '87.80', '89.20', '91.10', '93.60'),
(11, '2301000011', '84.50', '86.80', '88.50', '90.20', '92.70'),
(12, '2301000012', '87.50', '89.80', '91.50', '93.20', '95.70');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `fakultas`, `prodi`) VALUES
(1, 'Fakultas Ekonomi & Bisnis', 'Ekonomi Pembangunan'),
(2, 'Fakultas Ekonomi & Bisnis', 'Manajemen'),
(3, 'Fakultas Ekonomi & Bisnis', 'Akuntansi'),
(4, 'Fakultas Ekonomi & Bisnis', 'Kewirausahaan'),
(5, 'Fakultas Teknik', 'Teknik Industri'),
(6, 'Fakultas Teknik', 'Teknik Kimia'),
(7, 'Fakultas Teknik', 'Teknologi Pangan'),
(8, 'Fakultas Teknik', 'Teknik Sipil'),
(9, 'Fakultas Teknik', 'Teknik Lingkungan'),
(10, 'Fakultas Teknik', 'Teknik Mesin'),
(11, 'Fakultas Teknik', 'Fisika'),
(12, 'Fakultas Ilmu Komputer', 'Informatika'),
(13, 'Fakultas Ilmu Komputer', 'Sistem Informasi'),
(14, 'Fakultas Ilmu Komputer', 'Sains Data'),
(15, 'Fakultas Ilmu Komputer', 'Bisnis Digital'),
(16, 'Fakultas Ilmu Sosial & Politik', 'Administrasi Negara'),
(17, 'Fakultas Ilmu Sosial & Politik', 'Administrasi Bisnis'),
(18, 'Fakultas Ilmu Sosial & Politik', 'Ilmu Komunikasi'),
(19, 'Fakultas Ilmu Sosial & Politik', 'Hubungan Internasional'),
(20, 'Fakultas Ilmu Sosial & Politik', 'Pariwisata'),
(21, 'Fakultas Ilmu Sosial & Politik', 'Linguistik Indonesia'),
(22, 'Fakultas Arsitektur & Desain', 'Arsitektur'),
(23, 'Fakultas Arsitektur & Desain', 'Desain Komunikasi Visual'),
(24, 'Fakultas Arsitektur & Desain', 'Desain Interior'),
(25, 'Fakultas Pertanian', 'Agroteknologi'),
(26, 'Fakultas Pertanian', 'Agribisnis'),
(27, 'Fakultas Hukum', 'Hukum'),
(28, 'Fakultas Kedokteran', 'Kedokteran');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_cbt`
--

CREATE TABLE `lokasi_cbt` (
  `id` int(11) NOT NULL,
  `Gedung` varchar(255) DEFAULT NULL,
  `Ruangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi_cbt`
--

INSERT INTO `lokasi_cbt` (`id`, `Gedung`, `Ruangan`) VALUES
(1, 'GKB 1', 'Lab DKV - Lantai 1 GKB 1'),
(2, 'GKB 1', 'Lab Kom 1 - Lantai 1 GKB 1'),
(3, 'GKB 1', 'Lab Kom 2 - Lantai 1 GKB 1'),
(4, 'GKB 1', 'Lab Kom 3 - Lantai 1 GKB 1'),
(5, 'GKB 1', 'Lab Kom 4 - Lantai 1 GKB 1'),
(6, 'GKB 2 - FEB', 'Lab Kom 1.2 - Lantai 2 GKB 2 - FEB'),
(7, 'GKB 2 - FEB', 'Lab Kom 2.2 - Lantai 2 GKB 2 - FEB'),
(8, 'GKB 2 - FEB', 'Lab Kom 3.2 - Lantai 2 GKB 2 - FEB'),
(9, 'Fakultas Teknik', 'Laboratorium Aplikasi Komputer - Lantai 3 FT'),
(10, 'Fakultas Teknik', 'Laboratorium Statistik - Lantai 2 FT'),
(11, 'PUSKOM', 'Laboratorium Puskom - Lantai 1'),
(12, 'Fakultas Ilmu Komputer', 'Laboratorium PSSTI - Lantai 2 FIK'),
(13, 'Fakultas Ilmu Komputer', 'Laboratorium PTI - Lantai 2 FIK'),
(14, 'Fakultas Ilmu Komputer', 'Laboratorium SCR - Lantai 2 FIK'),
(15, 'Fakultas Ilmu Komputer', 'Laboratorium Solusi - Lantai 2 FIK'),
(16, 'Fakultas Ilmu Komputer', 'Laboratorium Sains Data - Lantai 2 FIK'),
(17, 'Fakultas Ekonomi & Bisnis', 'Laboratorium Terpadu 1 - Lantai 2 FEB 1'),
(18, 'Fakultas Ekonomi & Bisnis', 'Laboratorium Terpadu 2 - Lantai 2 FEB 1'),
(19, 'Fakultas Ekonomi & Bisnis', 'Laboratorium Akuntansi - Lantai 2 FEB 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `id_pendaftaran` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `id_pendaftaran`, `nama`, `password`, `nomor_telepon`, `email`) VALUES
(1, '2301000001', 'Fariz', '$2y$10$YBoVKl6d8j4VCJBuSFPx0O8wum/Y9rovseiB6raiBEPxsFmUir1JC', '08129994887', 'farizziraf3105@gmail.com'),
(2, '2301000002', 'Ahfaitar Abdil Hakim', '$2y$10$Oa625p4GZnj6tW6qwuIIXe0eMLUR3GLajc7T3QJg2NiXVi4LSqq6i', '085721519964', 'abdilhakim@gmail.com'),
(3, '2301000003', 'Budi Prasetyo', '$2y$10$PSDTrPJYiJCfhi.t/vySCuaVBLqb.233vfyAlwdTcWOSNOFgkK.Di', '082178945612', 'budi.prasetyo@example.com'),
(4, '2301000004', 'Dewi Rahayu', '$2y$10$mRpXP9Fm2HGrcHc4UUSW6OlpSWals4.IiIN57OqdTNWzP4kbEKHZe', '087612345678', 'dewi.rahayu@example.com'),
(5, '2301000005', 'Rudi Setiawan', '$2y$10$VmO.9W7E9zSMevzWMbHfr.lBLLR2xJQfkkk7AoxWDG8T7hmYO3Ki6', '081987654321', 'rudi.setiawan@example.com'),
(6, '2301000006', 'Siti Nurhayati', '$2y$10$FpvGTFOFf0MRIDXRFzV3.OYD6JYCu30E49BiRz1imKyCbonECPwEK', '082345678912', 'siti.nurhayati@example.com'),
(7, '2301000007', 'Rina Permata Sari', '$2y$10$kD6gKUCrXzehLivgpcl6.urTLWX3UgE9ofTbXR.seI/DpNlEdXzGO', '081234567890', 'rina.permata@example.com'),
(8, '2301000008', 'Budi Santoso', '$2y$10$pwScOxLYYlV5XlZCJMPUKugxH7IILRgpkAs6Pchi6kK53b9hgeSgy', '087654321098', 'budi.santoso@example.com'),
(9, '2301000009', 'Rizky Setiawan', '$2y$10$flwINnVdwaRHvtgRfH0wQOtZeCf3BXFql.bX.CnmtM27NDL9OGYOi', '081234567890', 'rizky.setiawan@example.com'),
(10, '2301000010', 'Siti Nurhayati', '$2y$10$vlwuhJohD3R146r0vJXMge9z2fJlUwK92Y4frXr0aQy2foUp7siy6', '081234567890', 'siti.nurhayati@example.com'),
(11, '2301000011', 'Ahmad Fauzi', '$2y$10$JA/qt4oc1b9REsMQEc9NAupCqH6n3z3sI21mLUluDI1FsRDuYOw6O', '081234567890', 'ahmad.fauzi@example.com'),
(12, '2301000012', 'Dian Permata Sari', '$2y$10$nqU14fJdmG398XlIUbbmv.qI7bLmztKQ/qgjAzi9fdbXT5HKO8hyG', '081234567890', 'dian.permatasari@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `jmr_biodata`
--
ALTER TABLE `jmr_biodata`
  ADD PRIMARY KEY (`jmr_biodata_id`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `jmr_cbt`
--
ALTER TABLE `jmr_cbt`
  ADD PRIMARY KEY (`cbt_id`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `jmr_datasekolah`
--
ALTER TABLE `jmr_datasekolah`
  ADD PRIMARY KEY (`jmr_datasekolah_id`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `jmr_ipispi`
--
ALTER TABLE `jmr_ipispi`
  ADD PRIMARY KEY (`ipispi_id`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `jmr_nilaipendukung1`
--
ALTER TABLE `jmr_nilaipendukung1`
  ADD PRIMARY KEY (`jmr_nilaipendukung1_id`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `jmr_nilaipendukung2`
--
ALTER TABLE `jmr_nilaipendukung2`
  ADD PRIMARY KEY (`jmr_nilaipendukung2_id`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `jmr_programstudi`
--
ALTER TABLE `jmr_programstudi`
  ADD PRIMARY KEY (`jmr_programstudi_id`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`),
  ADD KEY `program_studi1` (`program_studi1`),
  ADD KEY `program_studi2` (`program_studi2`);

--
-- Indexes for table `jmr_raport`
--
ALTER TABLE `jmr_raport`
  ADD PRIMARY KEY (`jmr_raport_id`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`),
  ADD KEY `idx_jurusan_id` (`jurusan_id`);

--
-- Indexes for table `lokasi_cbt`
--
ALTER TABLE `lokasi_cbt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `idx_users_id_pendaftaran` (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jmr_biodata`
--
ALTER TABLE `jmr_biodata`
  MODIFY `jmr_biodata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jmr_cbt`
--
ALTER TABLE `jmr_cbt`
  MODIFY `cbt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jmr_datasekolah`
--
ALTER TABLE `jmr_datasekolah`
  MODIFY `jmr_datasekolah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jmr_ipispi`
--
ALTER TABLE `jmr_ipispi`
  MODIFY `ipispi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jmr_nilaipendukung1`
--
ALTER TABLE `jmr_nilaipendukung1`
  MODIFY `jmr_nilaipendukung1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jmr_nilaipendukung2`
--
ALTER TABLE `jmr_nilaipendukung2`
  MODIFY `jmr_nilaipendukung2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jmr_programstudi`
--
ALTER TABLE `jmr_programstudi`
  MODIFY `jmr_programstudi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jmr_raport`
--
ALTER TABLE `jmr_raport`
  MODIFY `jmr_raport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lokasi_cbt`
--
ALTER TABLE `lokasi_cbt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jmr_biodata`
--
ALTER TABLE `jmr_biodata`
  ADD CONSTRAINT `jmr_biodata_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `users` (`id_pendaftaran`);

--
-- Constraints for table `jmr_cbt`
--
ALTER TABLE `jmr_cbt`
  ADD CONSTRAINT `jmr_cbt_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `users` (`id_pendaftaran`);

--
-- Constraints for table `jmr_datasekolah`
--
ALTER TABLE `jmr_datasekolah`
  ADD CONSTRAINT `jmr_datasekolah_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `users` (`id_pendaftaran`);

--
-- Constraints for table `jmr_ipispi`
--
ALTER TABLE `jmr_ipispi`
  ADD CONSTRAINT `jmr_ipispi_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `users` (`id_pendaftaran`);

--
-- Constraints for table `jmr_nilaipendukung1`
--
ALTER TABLE `jmr_nilaipendukung1`
  ADD CONSTRAINT `jmr_nilaipendukung1_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `users` (`id_pendaftaran`);

--
-- Constraints for table `jmr_nilaipendukung2`
--
ALTER TABLE `jmr_nilaipendukung2`
  ADD CONSTRAINT `jmr_nilaipendukung2_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `users` (`id_pendaftaran`);

--
-- Constraints for table `jmr_programstudi`
--
ALTER TABLE `jmr_programstudi`
  ADD CONSTRAINT `jmr_programstudi_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `users` (`id_pendaftaran`),
  ADD CONSTRAINT `jmr_programstudi_ibfk_2` FOREIGN KEY (`program_studi1`) REFERENCES `jurusan` (`jurusan_id`),
  ADD CONSTRAINT `jmr_programstudi_ibfk_3` FOREIGN KEY (`program_studi2`) REFERENCES `jurusan` (`jurusan_id`);

--
-- Constraints for table `jmr_raport`
--
ALTER TABLE `jmr_raport`
  ADD CONSTRAINT `jmr_raport_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `users` (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
