<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'      => 'Admin BAAk',
                'username'  => 'adminbaak',
                'password'  => password_hash('adminbaak123', PASSWORD_BCRYPT),
                'role'      => 1,
                'rolefakultas'  => null,
                'roleprodi'     => null
            ], [
                'nama'      => 'Admin Sains dan Teknologi',
                'username'  => 'adminsaintek',
                'password'  => password_hash('adminsaintek123', PASSWORD_BCRYPT),
                'role'      => 2,
                'rolefakultas'  => 'Sains dan Teknologi',
                'roleprodi'     => null
            ], [
                'nama'      => 'Admin Informatika',
                'username'  => 'admininformatika',
                'password'  => password_hash('admininformatika123', PASSWORD_BCRYPT),
                'role'      => 2,
                'rolefakultas'  => null,
                'roleprodi'     => 'Informatika'
            ]
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
