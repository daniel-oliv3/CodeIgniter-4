<?php 


//==========================
function show_form_errors($field, $error_collection){
    //Return the error if there his one/ Retorna o erro se houver
    if(key_exists($field, $error_collection)){
        return $error_collection[$field];
    }
}


//==========================
function isAdmin(){
    return session()->user->profile == 'admin' ? true: false;
}



















?>