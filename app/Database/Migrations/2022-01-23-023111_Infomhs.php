<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Infomhs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_infomhs'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'npmmhs'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'unique'         => TRUE
            ],
            'email'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'tempatlahir'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '60',
                'null'           => TRUE,
            ],
            'tanggallahir'      => [
                'type'           => 'DATE',
                'null'           => TRUE,
            ],
            'alamatrumah' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => TRUE,
            ],
            'alamatkantor' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => TRUE,
            ],
            'ortu' => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => TRUE,
            ],
            'namaortu' => [
                'type'           => 'VARCHAR',
                'constraint'     => '60',
                'null'           => TRUE,
            ],
            'asalsekolah'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'jenista'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => TRUE,
            ],
            'judulid'            => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => TRUE,
            ],
            'judulen'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => TRUE,
            ],
            'dosbim1'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => TRUE
            ],
            'dosbim2'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => TRUE
            ],
            'dosbim3'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => TRUE
            ],
            'penguji1'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => TRUE
            ],
            'penguji2'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => TRUE
            ],
            'penguji3'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => TRUE
            ],
            'tahunlulus'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => TRUE
            ],
            'gelar'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => TRUE
            ],
            'foto'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE
            ],
            'skripsi1'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE
            ],
            'skripsi2'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE
            ],

            'created_at'      => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'updated_at'      => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_infomhs', TRUE);

        // Membuat tabel
        $this->forge->createTable('infomhs', TRUE);
    }

    public function down()
    {
        // Menghapus tabel
        $this->forge->dropTable('infomhs');
    }
}
