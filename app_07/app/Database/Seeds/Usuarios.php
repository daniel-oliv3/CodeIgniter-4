<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuarios extends Seeder
{
    public function run()
    {
        //data insertion for users
        $users = [
            [
                'username' => 'daniel@gmail.com',
                'passwrd' => 'aaa'
            ],
            [
                'username' => 'priscila@gmail.com',
                'passwrd' => 'bbb'
            ],
            [
                'username' => 'sapup3@gmail.com',
                'passwrd' => 'ccc'
            ]
            ];



    }
}
