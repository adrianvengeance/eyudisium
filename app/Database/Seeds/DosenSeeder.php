<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'  => 'Cikgu Besar',
                'nidn'  => '12345678901',
            ],
            [
                'nama'  => 'Cikgu Melati',
                'nidn'  => '12345678902',
            ],
            [
                'nama'  => 'Cikgu Mawar',
                'nidn'  => '12345678903',
            ],
            [
                'nama'  => 'Papa Zola',
                'nidn'  => '12345678904',
            ]
        ];

        $this->db->table('countdown')->insert($data);
    }
}
