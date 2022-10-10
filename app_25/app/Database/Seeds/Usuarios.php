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
                'passwrd' => 'Aaaaaa1',
                'profile' => 'admin',
                'active' => 1
            ],
            [
                'username' => 'priscila@gmail.com',
                'passwrd' => 'Bbbbbb2',
                'profile' => 'user',
                'active' => 1
            ],
            [
                'username' => 'sapup3@gmail.com',
                'passwrd' => 'Cccccc3',
                'profile' => 'user',
                'active' => 1
            ]
            ];

            $db = db_connect();
            foreach($users as $user){

                $params = [
                    'username' => $user['username'],
                    'passwrd' => password_hash($user['passwrd'], PASSWORD_DEFAULT),
                    'profile' => $user['profile'],
                    'active' => $user['active']
                ];

                $db->query("INSERT INTO users(username, passwrd, profile, active) VALUES(AES_ENCRYPT(:username:, UNHEX(SHA2('".AES_KEY."', 512))), :passwrd:, :profile:, :active:)", $params);
            }

            echo 'Terminado!'.PHP_EOL;
    }
}
