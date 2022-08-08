<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $data = ['npm' => 18111100031];

        // // Simple Queries
        // $this->db->query("INSERT INTO mahasiswa (npm, nama) VALUES(:npm:, :nama:)", $data);
        // Using Query Builder
        $this->db->table('mahasiswa')->insert($data);
    }
}
