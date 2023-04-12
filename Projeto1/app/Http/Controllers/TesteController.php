<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    //

    function teste($cod){
        echo "Teste do controller".$cod;
    }

    public function soma($num1,$num2){
        $result = $num1 + $num2;
        echo $result;
    }
}
