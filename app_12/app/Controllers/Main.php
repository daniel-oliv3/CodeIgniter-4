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
            // login error
            die('Erro de login');
        }

        /* Get user available data */
        $id_user = $results['id_user'];
        $results = $users->get_user_data($id_user);
        //dd($results);

        /* Create user session */
        session()->set('user', $results[0]);

        //dd(session()->get());

        //echo '<prev>';
        //print_r(session()->get());

        return redirect('/');

    }    
}
