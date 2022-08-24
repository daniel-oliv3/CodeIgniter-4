<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Main extends BaseController
{
    public function index()
    {

        echo view('main/login_frm');
    }

    public function login_submit()
    {
        /* - */
        $users = new User();

        $username = $this->request->getPost('text_username');
        $passwrd = $this->request->getPost('text_passwrd');

        if(!$users->verify_login($username, $passwrd)){
            echo 'NOK';
        }else {
            echo 'OK';
        }

    }    
}
