<?php 


/*Verifica a sessão*/
function CheckSession(){
    return session()->has('user');
}

?>