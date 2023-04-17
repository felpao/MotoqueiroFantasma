<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\LocaisController;
use App\Http\Controllers\TiposControllers;
use App\Http\Controllers\ReservasController;
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

 Route::middleware(['auth'])->group(function () {
    Route::get('/tipo', [TiposControllers::class, 'listar']);
    Route::get('/tipo/create', [TiposControllers::class, 'create'])->name('tipo.create');
    Route::get('/tipo/{tipo_id}',[TiposControllers::class, 'show'])->name('tipo.show');
    Route::post('/tipo', [TiposControllers::class, 'store']);
    Route::patch('/tipo/{tipo_id}', [TiposControllers::class, 'update']);
    Route::delete('/tipo/{tipo_id}', [TiposControllers::class, 'deletar']);
    Route::resource('local', LocaisController::class);
    Route::resource('equipamento', EquipamentosController::class);
    Route::resource('cliente',ClientesController::class);
    Route::resource('reserva',ReservasController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




