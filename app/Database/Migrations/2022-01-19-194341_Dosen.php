<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dosen'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nidn'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
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
        $this->forge->addKey('id_dosen', TRUE);

        // Membuat tabel
        $this->forge->createTable('dosen', TRUE);
    }

    public function down()
    {
        // Menghapus tabel
        $this->forge->dropTable('dosen');
    }
}
