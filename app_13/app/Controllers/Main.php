<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{

    /*==============================================================*/
    public function index()
    {

        if(!CheckSession()){
            return redirect()->to('login_frm');
        }else {
            $this->home();
        }      
    }
    
    /*==============================================================*/
    public function home(){

        if(!CheckSession()){
            return redirect()->to('login_frm');
        }

        echo 'Aplicação!!!';
    }
}

      