<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berkas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_berkas'          => [
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

            'fotowarna'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'fotobw4x5'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'fotobw4x6'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'ktm'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'suketadmkeuangan'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'beritaacaraujianskripsi'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'suketpenyerahanskripsi'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'lempengdewanpenguji'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'suketsumbanganbuku'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'suketperpusda'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'suketperpusupy'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'daftarnilai'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'krsterakhir'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'suketperubahanidentitas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'sertifept'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'sertifujikomp'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'ktp'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'aktalahir'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'ijazah'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => TRUE,
            ],
            'dataalumni'      => [
                'type'           => 'TINYINT',
                'constraint'     => '1',
                'null'           => TRUE,
                'comment'        => 'not null berarti sudah mengisi tabel infomhs'
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
        $this->forge->addKey('id_berkas', TRUE);

        // Membuat tabel
        $this->forge->createTable('berkas', TRUE);
    }

    public function down()
    {
        // Menghapus tabel
        $this->forge->dropTable('berkas');
    }
}
