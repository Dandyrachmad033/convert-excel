<?php

namespace App\Controllers;
use App\Models\dbd;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class export extends BaseController
{
    public function download()
    {
        $model = new dbd();
        $data = $model->findAll();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $lastColumn = 'T';
        $sheet->mergeCells('A1:T2');
        $sheet->mergeCells('M3:T3');
        $sheet->mergeCells('R4:T5');
        $sheet->getStyle('A3:L3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C5DDB8'); // Mengatur warna hijau pada judul
        $sheet->getStyle('A3:L3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('R6:T6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E6')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C5DDB8');
        $sheet->getStyle('M3:T3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F0BF60');
        $sheet->getStyle('M4:Q4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F0BF60');
        $sheet->getStyle('R6:T6')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F0BF60');
        $sheet->getStyle('R4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F0BF60');

// Mengatur lebar kolom T dan mengatur lebar kolom lain secara otomatis
        $columns = range('A', 'D');
        foreach ($columns as $column) {
            $sheet->mergeCells($column . '3:' . $column . '6');
        }
        $sheet->mergeCells('E3:E5');
        $columns = range('F', 'L');
        foreach ($columns as $column) {
            $sheet->mergeCells($column . '3:' . $column . '6');
        }
        $columns = range('M', 'Q');
        foreach ($columns as $column) {
            $sheet->mergeCells($column . '4:' . $column . '6');
        }

       
        $align = $sheet->getStyle('A3:L3')->getAlignment();
        $align->setVertical(Alignment::VERTICAL_CENTER);
        $align->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $alignbaru = $sheet->getStyle('M4:Q4')->getAlignment();
        $alignbaru->setVertical(Alignment::VERTICAL_CENTER);
        $alignbaru->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $alignend = $sheet->getStyle('R4')->getAlignment();
        $alignend->setVertical(Alignment::VERTICAL_CENTER);
        $alignend->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getColumnDimension($lastColumn)->setAutoSize(true);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(46);
        $sheet->getColumnDimension('G')->setWidth(46);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('A')->setWidth(8);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(35);
        $sheet->getColumnDimension('C')->setWidth(37);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(30);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(24);
        $sheet->getColumnDimension('N')->setWidth(24);
        $sheet->getColumnDimension('O')->setWidth(27);
        $sheet->getColumnDimension('P')->setWidth(27);
        $sheet->getColumnDimension('Q')->setWidth(27);
        $sheet->getColumnDimension('R')->setWidth(20);
        $sheet->getColumnDimension('S')->setWidth(20);
        $sheet->getColumnDimension('T')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->setCellValue('E6', '(jika nik tidak ada)');
        $sheet->setCellValue('M3', 'DENGUE');
        $sheet->setCellValue('R4', 'Pengendalian Vektor');
        $sheet->setCellValue('R6', 'PSN 3M Plus');
        $sheet->setCellValue('S6', 'LARVASIDASI');
        $sheet->setCellValue('T6', 'FOGGING');
        
        $values = [
            'A' => 'NO',
            'B' => 'TANGGAL PEMERIKSAAN',
            'C' => 'NAMA',
            'D' => 'NIK(WAJIB)',
            'E' => 'NAMA IBU KANDUNG',
            'F' => 'ALAMAT(KTP)',
            'G' => 'ALAMAT DOMISILI',
            'H' => 'PROVINSI',
            'I' => 'KAB/KOTA',
            'J' => 'TEMPAT LAHIR',
            'K' => 'TANGGAL LAHIR(DD-MM-YYYY)',
            'L' => 'JENIS KELAMIN'

        ];
        foreach ($values as $column => $value) {
            $sheet->setCellValueExplicit($column . '3', $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        }
        $values = [
            'M' => 'DIAGNOSIS LAB',
            'N' => 'DIAGNOSIS KLINIS',
            'O' => 'STATUS AKHIR',
            'P' => 'PE',
            'Q' => 'HASIL PE',
            'R' => 'Pengendalian Vektor',
            
            

        ];
        foreach ($values as $column => $value) {
            $sheet->setCellValueExplicit($column . '4', $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        }
           // Data
        $row = 7;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['tanggal_pemeriksaan']);
            $sheet->setCellValue('C' . $row, $item['nama']);
            $sheet->setCellValue('D' . $row, $item['NIK']);
            $sheet->setCellValue('E' . $row, $item['nama_ibu_kandung']);
            $sheet->setCellValue('F' . $row, $item['alamat']);
            $sheet->setCellValue('G' . $row, $item['alamat_domisili']);
            $sheet->setCellValue('L' . $row, $item['jenis_kelamin']);
            $sheet->setCellValue('M' . $row, $item['tanggal_lahir']);
            $row++;
        }

        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Mengatur penempatan teks ke tengah
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Set the headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="siarvi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
