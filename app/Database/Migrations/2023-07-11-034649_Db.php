<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal_pemeriksaan' => [
                'type' => 'DATE',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'NIK' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'nama_ibu_kandung' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'alamat_domisili' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM("Laki-laki", "Perempuan")',
                'default' => 'Laki-laki',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('db', true);
    }

    public function down()
    {
        $this->forge->dropTable('db', true);
    }
}
