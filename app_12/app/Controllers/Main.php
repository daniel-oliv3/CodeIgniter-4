<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
    /* ======= - ======= */
    public function index()
    {

        if(!CheckSession()){
            $this->login_frm();
        }else {
            die('logado!');
        }      
    }        
}

      