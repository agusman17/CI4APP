<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'role_id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
            ],
            'user_id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        //FOREIGN KEY(`role_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('role_users');
    }

    public function down()
    {
        $this->forge->dropTable('role_users');
    }
}
