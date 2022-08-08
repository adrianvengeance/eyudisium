<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'npm'           => 12345678901,
            'nama'          => 'Upin',
            'jeniskelamin'  => 'm',
            'nomorwa'       => 82112121212,
            'prodi'         => 'Informatika',
            'fakultas'      => 'Sains dan Teknologi'
        ];
        $this->db->table('mahasiswa')->insert($data);
    }
}
