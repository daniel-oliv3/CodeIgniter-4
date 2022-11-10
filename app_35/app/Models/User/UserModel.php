<?php

namespace App\Models\User;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /*============================================================================*/
    public function verify_login($username, $passwrd){

        $params = [
            'username' => $username
        ];

        $db = db_connect();
       
        $results = $db->query("SELECT id, passwrd FROM users WHERE {$this->aes_encrypt(':username:')} = username AND active = 1", $params)->getResultObject();
        
        //return results
        if(count($results) == 0){
            return [
                'status' => false,
                'id_user' => null
            ];
        }

        if(!password_verify($passwrd, $results[0]->passwrd)){
            return [
                'status' => false,
                'id_user' => null
            ];
        }else {
            return [
                'status' => true,
                'id_user' => $results[0]->id
            ];
        }    
    }

    /*============================================================================*/
    public function get_user_data($id_user){
        $params = [
            'id_user' => $id_user
        ];

        $db = db_connect();

        return $db->query("SELECT id, {$this->aes_decrypt('username')}, `profile` FROM users WHERE id = :id_user:", $params)->getResultObject();
    }
    /*============================================================================*/
    public function check_if_user_account_already_exists($username){
        $params = [
            'username' => $username
        ];
        $db = db_connect();
        $results = $db->query("SELECT id FROM users WHERE {$this->aes_encrypt(':username:')} = username", $params)->getResultObject();
        return count($results) == 0 ? false : true;
    }
    /*============================================================================*/
    public function create_new_user_account($username, $passwrd){

        $purl = create_hash(12);
        $profile = 'user';

        $params = [
            'username' => $username,
            'passwrd' => password_hash($passwrd, PASSWORD_DEFAULT),
            'profile' => $profile,
            'purl' => $purl
        ];
        
        $db = db_connect();
        $db->query(
            "INSERT INTO users(username, passwrd, profile, purl) VALUES" .
            "(" . 
            "{$this->aes_encrypt(':username:')}, " .
            ":passwrd:, " .
            ":profile:, " .
            ":purl:" .
            ")"
        , $params);

        return $params['purl'];
    }

    /*============================================================================*/
    public function check_confirm_email_address($purl){
        $params = [
            'purl' => $purl
        ];
        
        $db = db_connect();
        $results = $db->query("SELECT id FROM users WHERE purl = :purl:", $params)->getResultObject();
        if($db->affectedRows() == 0){
            return false;
        }

        //Update the database to confirm the email address
        $params = [
            'id' => $results[0]->id
        ];
        $db->query("UPDATE users SET purl = NULL, updated_at = NOW(), active = 1 WHERE id = :id:", $params);

        return true;
    }

    /*============================================================================*/
    public function check_if_user_can_recover_password($username){
        //check if the user is in conditions to recover password/verificar se o usuário está em condições de recuperar a senha
        //verifica se o usuario tem conta na base de dados
        //email existe, ativo = 1
    }

    /*============================================================================*/
    private function aes_encrypt($field_value){
        return "AES_ENCRYPT($field_value, UNHEX(SHA2('".AES_KEY."', 512)))";
    }
    /*============================================================================*/
    private function aes_decrypt($field_value){
        return "AES_DECRYPT($field_value, UNHEX(SHA2('".AES_KEY."', 512))) $field_value";
    }

}
