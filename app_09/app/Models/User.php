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

    //Função
    public function verify_login($username, $passwrd){
        //tradicional
        //return $this->findAll();

        /* - */
        $params = [
            'username' => $username
        ];

        $db = db_connect();
        $result = $db->query("SELECT id, passwrd FROM users WHERE AES_ENCRYPT(:username:, UNHEX(SHA2('".AES_KEY."', 512))) = username", $params)->getResultObject();

    }

    //function private
    private function aes_encrypt($field_value){
        return "AES_ENCRYPT($field_value, UNHEX(SHA2('".AES_KEY."', 512)))";
    }
}
