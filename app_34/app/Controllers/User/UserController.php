<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\UserModel;

class UserController extends BaseController
{
    //
    protected $userModel;

    public function __construct()
    {

        $this->userModel = new UserModel();

    }

    public function index()
    {
        //Index    
    }



    /*======================================================*/
    /* LOGIN                                                */
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

        // $users = new UserModel();

        $username = $this->request->getPost('text_username');
        $passwrd = $this->request->getPost('text_passwrd');

        //Check if login is ok
        $results = $this->userModel->verify_login($username, $passwrd);

        if(!$results['status']){
            // login error
            die('Erro de login');
        }

        /* Get user available data */
        $id_user = $results['id_user'];
        $results = $this->userModel->get_user_data($id_user);

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
    /* NEW USER ACCOUNT                                     */
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
        // $user = new UserModel();
        $result = $this->userModel->check_if_user_account_already_exists($this->request->getPost('text_username'));

        if($result){
            die('Já existe uma conta com o mesmo email!');
        }

        //Create new user account
        $username = $this->request->getPost('text_username');
        $passwrd = $this->request->getPost('text_passwrd');
        $purl_code = $user->create_new_user_account($username, $passwrd);


        //Send email with purl to validation email address
        $purl = site_url('verify_email/' . $purl_code);
        //echo $purl;

        $email = \Config\Services::email();
        $email->setFrom('ci_auth@ci_auth.com', 'CI Auth');
        $email->setTo($username);

        $email->setSubject('CI Auth - Confirmação de email');
        $email->setMailType('html');

        $message = 
        '
        <h3>CI Auth - Confirmação de conta de usuário</h3>
        <p>Para concluir o seu registro, clique no link abaixo.</p>
        <p>
        <a href="' . $purl . '">Confirmar email</a>
        </p>
        ';
        $email->setMessage($message);
        $email->send();

        $this->show_confirmation_email($username);

    }

    /*======================================================*/
    private function show_confirmation_email($username){
        $data['email'] = $username;
        echo view('user/show_confirmation_email', $data);
    }

    /*======================================================*/
    public function verify_email($purl = null){

        //Check if is purl valid
        if(empty($purl) || strlen($purl) != 12){
            return redirect()->to('/');
        }

        // $user = new UserModel();
        $results = $this->userModel->check_confirm_email_address($purl);



        //purl is invalid
        if(!$results){
            return redirect()->to('/');
        }

        //purl is ok. Account confirmation success
        echo view('user/show_confirmation_final_message');

        

    }



    /*======================================================*/
    /* RECOVER PASSWORD                                     */
    /*======================================================*/
    public function recover_password_frm(){
        return view('user/recover_password_frm');
    }

    /*======================================================*/
    public function recover_password_submit(){
        echo 'Submit Okay';
    }























    /*======================================================*/
    public function versessao(){
        echo '<pre>';
        print_r(session()->get());
    }

}