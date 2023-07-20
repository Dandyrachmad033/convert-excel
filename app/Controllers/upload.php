<?php

namespace App\Controllers;

use App\Models\dbd;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class upload extends BaseController
{
    public function inserting()
    {
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('excelFile');

            if ($file->isValid() && $file->getExtension() === 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($file->getTempName());
                $worksheet = $spreadsheet->getActiveSheet();

                $rows = $worksheet->toArray();
                $data =[];

                if (!empty($rows)) {
                    $startRow = 11; 
    
                    for ($i = $startRow; $i <= count($rows); $i++) {

                        $id = $worksheet->getCell('A' . $i)->getValue();
                        $tgl = $worksheet->getCell('G' . $i)->getValue();
                        $nama = $worksheet->getCell('B' . $i)->getValue();
                        $nik = $worksheet->getCell('C' . $i)->getValue();
                        $ibu = $worksheet->getCell('U' . $i)->getValue();
                        $alamat = $worksheet->getCell('E' . $i)->getValue();
                        $domisili = $worksheet->getCell('E' . $i)->getValue();
                        $lahir = $worksheet->getCell('I' . $i)->getValue();
                        $jenis_kelamin = $worksheet->getCell('D' . $i)->getValue(); 

                        $data[] = [
                            'id' => $id,
                            'tanggal_pemeriksaan' => $tgl,
                            'nama' => $nama,
                            'NIK' => $nik,
                            'nama_ibu_kandung' => $ibu,
                            'alamat' => $alamat,
                            'alamat_domisili' => $domisili,
                            'tanggal_lahir' => $lahir,
                            'jenis_kelamin' => $jenis_kelamin,
                             // Menambahkan nilai dari kolom B ke dalam array data
                        ];
                    }

                    $model = new dbd();
                    $model->insertBatch($data);
                } else {
                    // Handle the case when there are no rows with data
                }
            } else {
                // File tidak valid atau bukan file Excel (.xlsx)
                // Handle kesalahan di sini
            }
        }

        return redirect()->route('home');
    }
}

