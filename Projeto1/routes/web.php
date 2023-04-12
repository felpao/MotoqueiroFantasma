<?php

use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
route::get('teste', function(){
    echo"teste!!!";

});

route::get('teste/{cod}', function($cod){
    echo"voce enviou ". $cod;
});

route::get('teste2/{cod}', [TesteController::class, 'teste']);
//passar 2 numeiros em uma rota de nome some, e retornar do controller a soma deles

route::get('soma/{num1}/{num2}', [TesteController::class, 'soma']);


route::post('novo', function(){
    echo'enviou por post';
});


