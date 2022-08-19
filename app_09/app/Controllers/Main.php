<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
    public function index()
    {

        echo view('main/login_frm');
    }

    public function login_submit()
    {

        echo 'Aqui';
    }
}
