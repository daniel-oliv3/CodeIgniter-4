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

        // check if there are validation erros is session (verifique se há erros de validação é sessão)
        $data = [];
        if(session()->has('validation_errors')){
            $data['validation_errors'] = session()->getFlashdata('validation_errors');
        }

        echo view('user/login_frm', $data);
    }

    /*======================================================*/
    public function login_submit()
    {
        if($this->request->getMethod() != 'post'){
            return redirect()->to('/');
        }

        /* Validação do formulário */
        $validation = $this->validate([
            'text_username' => [
                'label' => 'Username',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'O compo {field} é de preenchimento obrigátorio.',
                    'valid_email' => 'O compo {field} tem que ser um email válido.'
                ]
            ],
            'text_passwrd' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]|max_length[18]|regex_match[/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/]',
                'errors' => [
                    'required' => 'O compo {field} é de preenchimento obrigátorio.',
                    'min_length' => 'O campo {field} tem que ter, no mínimo, {param} caracteres.',
                    'max_length' => 'O campo {field} tem que ter, no máximo, {param} caracteres.',
                    'regex_match' => 'A password tem que ter uma letra minúscula, uma maiúscula e um digito.'
                ]
            ]
        ]);

        // Ckeck if validation has failed (Verifique se a validação falhou)
        if(!$validation){
            return redirect()
                ->back()
                ->withInput()
                ->with('validation_errors', $this->validator->getErrors());
        }

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
    public function logout(){
        //logout
        session()->remove('user');
        return redirect()->to('/');
    }
    
    /*======================================================*/
    // NEW USER ACCOUNT
    /*======================================================*/
    public function new_user_account_frm(){
        // check if there are validation erros is session (verifique se há erros de validação é sessão)
        $data = [];
        if(session()->has('validation_errors')){
            $data['validation_errors'] = session()->getFlashdata('validation_errors');
        }

        echo view('user/new_user_account_frm', $data);
    }


    /*======================================================*/
    public function new_user_account_submit(){
        if($this->request->getMethod() != 'post'){
            return redirect()->to('/');
        }

        /* Validação do formulário */
        $validation = $this->validate([
            'text_username' => [
                'label' => 'Username',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'O compo {field} é de preenchimento obrigátorio.',
                    'valid_email' => 'O compo {field} tem que ser um email válido.'
                ]
            ],
            'text_passwrd' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]|max_length[18]|regex_match[/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/]',
                'errors' => [
                    'required' => 'O compo {field} é de preenchimento obrigátorio.',
                    'min_length' => 'O campo {field} tem que ter, no mínimo, {param} caracteres.',
                    'max_length' => 'O campo {field} tem que ter, no máximo, {param} caracteres.',
                    'regex_match' => 'A password tem que ter uma letra minúscula, uma maiúscula e um digito.'
                ]
            ],
            'text_repeat_passwrd' => [
                'label' => 'Repetir Password',
                'rules' => 'required|min_length[6]|max_length[18]|regex_match[/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/]|matches[text_passwrd]',
                'errors' => [
                    'required' => 'O compo {field} é de preenchimento obrigátorio.',
                    'min_length' => 'O campo {field} tem que ter, no mínimo, {param} caracteres.',
                    'max_length' => 'O campo {field} tem que ter, no máximo, {param} caracteres.',
                    'regex_match' => 'A password tem que ter uma letra minúscula, uma maiúscula e um digito.',
                    'metches' => 'A repetição do password deve ver igual a password.'
                ]
            ]
        ]);

        // Ckeck if validation has failed (Verifique se a validação falhou)
        if(!$validation){
            return redirect()
                ->back()
                ->withInput()
                ->with('validation_errors', $this->validator->getErrors());
        }

        //Check if username already exists in database/ Verifique se o nome de usuário já existe no banco de dados
        $user = new UserModel();
        $result = $user->check_if_user_account_already_exists($this->request->getPost('text_username'));

        if($result){
            die('Já existe uma conta com o mesmo email!');
        }

        //Create new user account
        $username = $this->request->getPost('text_username');
        $passwrd = $this->request->getPost('text_passwrd');
        $purl_code = $user->create_new_user_account($username, $passwrd);


        //Send email with purl to validation email address

    }

    /*======================================================*/
    public function verify_email($purl = null){
        die($purl);
    }


    /*======================================================*/
    public function versessao(){
        echo '<pre>';
        print_r(session()->get());
    }

}