<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'npm'                   => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'unique'         => TRUE
            ],
            'nama'                  => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'jeniskelamin'      => [
                'type'           => 'CHAR',
                'constraint'     => '1',
                'comment'        => 'm or f'
            ],
            'nomorwa'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => TRUE,
            ],
            'prodi'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'fakultas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'commment'       => 'Bisnis, FKIP, Pertanian, Sains dan Teknologi'
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
        $this->forge->addKey('id_mahasiswa', TRUE);

        // Membuat tabel
        $this->forge->createTable('mahasiswa', TRUE);
    }

    public function down()
    {
        // Menghapus tabel
        $this->forge->dropTable('mahasiswa');
    }
}
