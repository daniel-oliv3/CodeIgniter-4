<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\UserModel;

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
        echo view('user/login_frm');
    }

    public function login_submit()
    {
        /* Validação do formulário */
        $users = new UserModel();

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
    
    /*======================================================*/
    // NEW USER ACCOUNT
    /*======================================================*/
    public function new_user_account_frm(){
        echo 'formulario para novo usuario';
    }


    /*======================================================*/
    public function new_user_account_submit(){
        echo 'submissão do formulario para novo usuario';
    }


}
