<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InitiatedUser extends Seeder
{
    public function run()
    {
        /**
         * seeder for default user
         */

        $data = [
            [
                'name'          => 'Super Admin',
                'email'         => 'admin@gmail.com',
                'password'      => password_hash('123456', PASSWORD_DEFAULT),
                'no_handphone'  => '+62 811 255 504',
                'address'       => 'Trini RT 01 RW 16 Trihanggo Sleman DI Yogyakarta',
                'created_at'    => Time::now(),
                'verify_at'     => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'name'          => 'Admin',
                'email'         => 'adm@gmail.com',
                'password'      => password_hash('123456', PASSWORD_DEFAULT),
                'no_handphone'  => '+62 811 255 504',
                'address'       => 'Trini RT 01 RW 16 Trihanggo Sleman DI Yogyakarta',
                'created_at'    => Time::now(),
                'verify_at'     => Time::now(),
                'updated_at'    => Time::now(),
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
