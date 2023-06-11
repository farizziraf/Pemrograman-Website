<?php
$file_path = 'SURAT-PERNYATAAN-KESEDIAAN-MEMBAYAR-SPI.pdf'; // Ubah dengan path file PDF yang sesuai

if (file_exists($file_path)) {
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="SURAT-PERNYATAAN-KESEDIAAN-MEMBAYAR-SPI.pdf"');
  readfile($file_path);
} else {
  echo "File tidak ditemukan.";
}
?>
