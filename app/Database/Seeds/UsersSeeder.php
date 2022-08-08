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
            ]
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
