<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{

    /*==============================================================*/
    public function index(){    
        
        
        return view('main/home');
    }

    /*==============================================================*/
    public function area1(){       
        die('area1');
    }

    /*==============================================================*/
    public function area2(){       
        die('area2');
    }

    /*==============================================================*/
    public function area3(){       
        die('area3');
    }

    public function teste(){
        //echo create_hash();
        echo strtolower(create_hash());
    }
    
}


