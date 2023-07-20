<?php

namespace App\Models;

use CodeIgniter\Model;

class dbd extends Model
{
    protected $table = "db";
    protected $allowedFields = [
        'id',
        'tanggal_pemeriksaan',
        'nama','NIK','nama_ibu_kandung',
        'alamat','alamat_domisili',
        'tanggal_lahir',
        'jenis_kelamin'
    ];
}