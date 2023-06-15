<?php
include('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'ID Pendaftaran');
$sheet->setCellValue('C1', 'Nama');
$sheet->setCellValue('D1', 'Nomor Telepon');
$sheet->setCellValue('E1', 'Email');

$query = mysqli_query($conn, "SELECT * FROM users");
$i = 2;
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $sheet->setCellValue('A' . $i, $no++);
    $sheet->setCellValue('B' . $i, $row['id_pendaftaran']);
    $sheet->setCellValue('C' . $i, $row['nama']);
    $sheet->setCellValue('D' . $i, $row['nomor_telepon']);
    $sheet->setCellValue('E' . $i, $row['email']);
    $i++;
}

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_LEFT,
    ],
];
$i = $i - 1;
$sheet->getStyle('A1:E' . $i)->applyFromArray($styleArray);

// Auto-size columns
foreach (range('A', 'E') as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);
$filename = 'Report Data Pendaftar.xlsx';

// Set headers
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
