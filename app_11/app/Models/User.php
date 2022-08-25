<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
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
        //$result = $db->query("SELECT id, passwrd FROM users WHERE AES_ENCRYPT(:username:, UNHEX(SHA2('".AES_KEY."', 512))) = username", $params)->getResultObject();
        $results = $db->query("SELECT id, passwrd FROM users WHERE {$this->aes_encrypt(':username:')} = username", $params)->getResultObject();
        
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
    public function get_username_data($id_user){

    }
    /*============================================================================*/
    private function aes_encrypt($field_value){
        return "AES_ENCRYPT($field_value, UNHEX(SHA2('".AES_KEY."', 512)))";
    }
}
