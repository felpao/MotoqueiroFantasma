<?php

use App\Http\Controllers\EquipamentosControllers;
use App\Http\Controllers\LocaisController;
use App\Http\Controllers\TiposController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tipo', [TiposController::class, 'listar']);
Route::get('/tipo/create', [TiposController::class, 'create']);
Route::get('/tipo/{tipo_id}', [TiposController::class, 'show']);
Route::post('tipo', [TiposController::class, 'store']);
Route::patch('/tipo/{tipo/id}', [TiposController::class, 'update']);
Route::delete('/tipo/{tipo_id}', [TiposController::class, 'deletar']);

Route::resource('local', LocaisController::class);
Route::resource('equipamento', EquipamentosControllers::class);

