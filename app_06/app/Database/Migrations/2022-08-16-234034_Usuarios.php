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
            'useremail' => [
                'type' => 'VARBINARY',
                'constraint' => '200',
                'null' => true
            ]
        ]);
    }

    public function down()
    {
        // reverse table creation
        $this->forge->dropTable('users');
    }
}
