<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class History extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'npmmhs'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'unique'         => true
            ],
            'nama'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE
            ],
            'fakultas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE
            ],
            'prodi'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE
            ],
            'tanggal'      => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'created_at'      => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'updated_at'      => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'deleted_at'      => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel
        $this->forge->createTable('history', TRUE);
    }

    public function down()
    {
        // Menghapus tabel
        $this->forge->dropTable('history');
    }
}
