<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{

    /*==============================================================*/
    public function index()
    {

        /*if(!CheckSession()){
            return redirect()->to('login_frm');
        }else {
            $this->home();
        }*/
        
        echo 'teste1';

    }
    
    /*==============================================================*/
    public function home(){

        /*if(!CheckSession()){
            return redirect()->to('login_frm');
        }

        echo 'Aplicação!!!';*/
    
        echo 'teste2';

    }
}

      