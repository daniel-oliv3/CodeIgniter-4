<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        //create users table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARBINARY',
                'constraint' => '200',
                'null' => true
            ],
            'passwrd' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ],
            'profile' => [
                'type' => 'VARCHAR',
                'constraint' => '1000',
                'null' => true
            ],
            'blocked_until' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ] 
        ]);

        //create primary key
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        // reverse table creation
        $this->forge->dropTable('users');
    }
}
