<?php 


/*======================================================*/
function show_form_errors($field, $error_collection){
    //Return the error if there his one/ Retorna o erro se houver
    if(key_exists($field, $error_collection)){
        return $error_collection[$field];
    }
}


/*======================================================*/
function isAdmin(){
    return session()->user->profile == 'admin' ? true: false;
}


/*======================================================*/
function create_hash($char_number = 8){
    $chars = "abcdefghijlmnopqrstuvwxyzABCDEFGHIJLMNOPQRSTUVWXYZabcdefghijlmnopqrstuvwxyzABCDEFGHIJLMNOPQRSTUVWXYZabcdefghijlmnopqrstuvwxyzABCDEFGHIJLMNOPQRSTUVWXYZ";
    return substr(str_shuffle($chars), 0, $char_number);
}


/*======================================================*/
/*================= OPEN SSL ENCRYPT ===================*/
/*======================================================*/
function aes_encrypt($value){
    return bin2hex(openssl_encrypt($value, 'aes-256-cbc', OPENSSL_KEY, OPENSSL_RAW_DATA, OPENSSL_IV));
}


/*======================================================*/
function aes_decrypt($value){
    //Check if value if length even
    if(strlen($value) % 2 != 0){
        return false;
    } else {
        return openssl_decrypt(hex2bin($value), 'aes-256-cbc', OPENSSL_KEY, OPENSSL_RAW_DATA, OPENSSL_IV);
    }
}



/*======================================================*/
function printData($data, $die = true){
    
    echo '<pre>';
    if(is_object($data) || is_array($data)){
        print_r($data);
    }else {
        echo $data;
    }

    if($die){
        die(PHP_EOL . 'TERMINADO');
    }
}

















?>