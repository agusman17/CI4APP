<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {
        /**
         * seeder for default user
         */

        // $data = [
        //     [
        //         'name'          => 'Super Admin',
        //         'email'         => 'admin@gmail.com',
        //         'password'      => password_hash('123456', PASSWORD_DEFAULT),
        //         'no_handphone'  => '081542601537',
        //         'address'       => 'Jl. Dumy No.1',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now(),
        //     ],
        //     [
        //         'name'          => 'Admin',
        //         'email'         => 'adm@gmail.com',
        //         'password'      => password_hash('123456', PASSWORD_DEFAULT),
        //         'no_handphone'  => '081542601537',
        //         'address'       => 'Jl. Dumy No.2',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now(),
        //     ]
        // ];

        // $this->db->table('users')->insertBatch($data);


        /**
         * seeder if unit more data
         * u can uncomment code below
         */

        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 77; $i++) {
            $data = [
                'name'          => $faker->firstName,
                'email'         => $faker->email,
                'password'      => password_hash('123456', PASSWORD_DEFAULT),
                'no_handphone'  => $faker->phoneNumber,
                'address'       => 'Jl. Saja Dulu No.1',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];

            // Simple Queries
            $this->db->table('users')->insert($data);
        }
    }
}
