<?php

namespace App\Controllers;
use App\Models\Usuario;

class Home extends BaseController
{
    public function index()
    {
        
        $usuarios = new Usuario();
        $resultados = $usuarios->findAll();
        

        echo '<prev>';
        print_r($resultados);
    }
}
