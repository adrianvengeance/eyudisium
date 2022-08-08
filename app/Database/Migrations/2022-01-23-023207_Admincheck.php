<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admincheck extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'npmmhs'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'unique'         => true,
            ],
            'nama'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'fakultas'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'prodi'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'prodicheck'      => [
                'type'           => 'TINYINT',
                'constraint'     => '1',
                'comment'        => '1 accepted, 2 refused',
                'null'           => TRUE,
            ],
            'alasanprodi'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'ajukankefk'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => TRUE,
            ],
            'diajukan_at'      => [
                'type'           => 'datetime',
                'null'           => TRUE,
            ],
            'fakultascheck'      => [
                'type'           => 'TINYINT',
                'constraint'     => '1',
                'comment'        => '1 accepted, 2 refused',
                'null'           => TRUE,
            ],
            'alasanfakultas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'validasikebaak'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => TRUE,
            ],
            'divalidasi_at'      => [
                'type'           => 'datetime',
                'null'           => TRUE,
            ],
            'baakcheck'      => [
                'type'           => 'TINYINT',
                'constraint'     => '1',
                'comment'        => '1 accepted, 2 refused',
                'null'           => TRUE,
            ],
            'alasanbaak'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'calonyudisium'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '5',
                'null'           => TRUE,
            ],
            'calon_at'      => [
                'type'           => 'datetime',
                'null'           => TRUE,
            ],
            'created_at'      => [
                'type'           => 'DATETIME',
            ],
            'updated_at'      => [
                'type'           => 'DATETIME',
            ],
        ]);
        // Membuat primary key
        $this->forge->addKey('id_admin', TRUE);

        // Membuat tabel
        $this->forge->createTable('admincheck', TRUE);
    }

    public function down()
    {
        // Menghapus tabel
        $this->forge->dropTable('admincheck');
    }
}
