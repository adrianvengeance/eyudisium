<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'username'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
                'unique'         => true
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 60,
            ],
            'role'      => [
                'type'           => 'int',
                'constraint'     => '1',
                'comment'        => '1. BAAk, 2. Fakultas, 3. Prodi, 4. Mahasiswa',
            ],
            'rolefakultas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => true,
            ],
            'roleprodi'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => true,
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        // menghapus tabel 
        $this->forge->dropTable('users');
    }
}
