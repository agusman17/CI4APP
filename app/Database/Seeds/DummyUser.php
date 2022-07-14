<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use CodeIgniter\I18n\Time;

class DummyUser extends Seeder
{
    public function run()
    {
        /**
         * seeder if unit more data Users
         */

        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
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
