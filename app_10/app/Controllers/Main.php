<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Main extends BaseController
{
    /* ======= - ======= */
    public function index()
    {

        if(!CheckSession()){
            //return redirect()->to('main/login_frm');
            $this->login_frm();
        }else {
            die('logado!');
        }      

    }

    /*======================================================*/
    // LOGIN
    /*======================================================*/
    private function login_frm(){
        echo view('main/login_frm');
    }

    public function login_submit()
    {
        /* Validação do formulário */
        $users = new User();

        $username = $this->request->getPost('text_username');
        $passwrd = $this->request->getPost('text_passwrd');

        //Check if login is ok
        $results = $users->verify_login($username, $passwrd);

        if(!$results['status']){
            echo 'NOK';
        }else {
            echo 'OK<br>';
            echo $results['id_user'];
        }

        /* Create user session */

    }    
}
