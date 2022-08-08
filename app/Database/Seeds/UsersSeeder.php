<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // // 1 data
        // $data = [
        //     'nama'      => 'BAAk',
        //     'username'  => 'adminbaak',
        //     'password'  => password_hash('adminbaak', PASSWORD_BCRYPT),
        //     'role'      => 1
        // ];
        // $this->db->table('users')->insert($data);


        // multidata
        $data = [
            [
                'nama'      => 'Fakultas',
                'username'  => 'adminfakultas',
                'password'  => password_hash('adminfakultas', PASSWORD_BCRYPT),
                'role'      => 2
            ],
            [
                'nama'      => 'Prodi',
                'username'  => 'adminprodi',
                'password'  => password_hash('adminprodi', PASSWORD_BCRYPT),
                'role'      => 3
            ],
            [
                'nama'      => 'Adrian',
                'username'  => '18111100031',
                'password'  => password_hash('18111100031', PASSWORD_BCRYPT),
                'role'      => 4
            ]
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
