<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Countdown extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => TRUE
            ],
            'fakultas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'batas_waktu'   => [
                'type'           => 'datetime',
            ]
        ]);
        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel
        $this->forge->createTable('countdown', TRUE);
    }

    public function down()
    {
        // Menghapus tabel
        $this->forge->dropTable('countdown');
    }
}
