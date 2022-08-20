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
        dd($users->verify_login('',''));
    }

    
}
