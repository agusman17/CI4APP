<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InitiatedRole extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'          => 'Super Admin',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'name' => 'Admin',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'name' => 'Customer',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ]
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
