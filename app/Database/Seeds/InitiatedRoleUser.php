<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitiatedRoleUser extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role_id'       => 1,
                'user_id'       => 1,
            ],
            [
                'role_id'       => 2,
                'user_id'       => 2,
            ]
        ];
        $this->db->table('role_users')->insertBatch($data);
    }
}
