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
            ],
            [
                'username' => 'priscila@gmail.com',
                'passwrd' => 'Bbbbbb2',
                'profile' => 'user',
            ],
            [
                'username' => 'sapup3@gmail.com',
                'passwrd' => 'Cccccc3',
                'profile' => 'user',
            ]
            ];

            $db = db_connect();
            foreach($users as $user){

                $params = [
                    'username' => $user['username'],
                    'passwrd' => password_hash($user['passwrd'], PASSWORD_DEFAULT),
                    'profile' => $user['profile']
                ];

                $db->query("INSERT INTO users(username, passwrd, profile) VALUES(AES_ENCRYPT(:username:, UNHEX(SHA2('".AES_KEY."', 512))), :passwrd:, :profile:)", $params);
            }

            echo 'Terminado!'.PHP_EOL;
    }
}
