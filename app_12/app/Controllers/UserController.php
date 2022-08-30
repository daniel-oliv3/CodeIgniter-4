<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        //Index        
        
    }

    /*======================================================*/
    // LOGIN
    /*======================================================*/
    public function login_frm(){
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

        /* Create user session */
        session()->set('user', $results[0]);

        return redirect('/');

    } 
}
