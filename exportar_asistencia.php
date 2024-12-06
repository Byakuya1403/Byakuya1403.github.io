<?php
require 'vendor/autoload.php';  // Usa PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Encabezados
$sheet->setCellValue('A1', 'Usuario');
$sheet->setCellValue('B1', 'Título');
$sheet->setCellValue('C1', 'Fecha');
$sheet->setCellValue('D1', 'Duración');

// Aquí debes llenar los datos de la asistencia
// Ejemplo:
$sheet->setCellValue('A2', 'Usuario1');
$sheet->setCellValue('B2', 'Evento 1');
$sheet->setCellValue('C2', '2024-12-06');
$sheet->setCellValue('D2', '2 horas');

// Guardar el archivo Excel
$writer = new Xlsx($spreadsheet);
$writer->save('asistencia.xlsx');

// Descargar el archivo
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="asistencia.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit;
?>
