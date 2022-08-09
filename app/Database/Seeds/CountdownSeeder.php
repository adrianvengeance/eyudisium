<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CountdownSeeder extends Seeder
{
    public function run()
    {
        helper('date');
        $data = [
            [
                'fakultas'      => 'FKIP',
                'batas_waktu'   => date('Y-m-d H:i:s', now()),
            ],
            [
                'fakultas'      => 'Bisnis',
                'batas_waktu'   => date('Y-m-d H:i:s', now()),
            ],
            [
                'fakultas'      => 'Pertanian',
                'batas_waktu'   => date('Y-m-d H:i:s', now()),
            ],
            [
                'fakultas'      => 'Sains dan Teknologi',
                'batas_waktu'   => date('Y-m-d H:i:s', now()),
            ]
        ];

        $this->db->table('countdown')->insertBatch($data);
    }
}
