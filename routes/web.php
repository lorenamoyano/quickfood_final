<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/**
 * REDIRIGE A LA PÁGINA INDEX
 */
/*Route::get('index' , function () {
    $titulo = "Usuarios";

    return view('index' , array( 
        'titulo' => $titulo
    ));
});

/**
 * REDIRIGE AL LOGIN Y AL REGISTRO
 */

/*Route::get('login' , function() {
    $title = "Login";

    return view('users.login' , array(
        'login' => $title
    ));
});*/

Auth::routes();

//Route::match(['get','post'], '/ver', [App\Http\Controllers\CartaController::class, 'ver'])->name('ver');
Route::get('/profile/{id}' ,  [App\Http\Controllers\ClienteController::class, 'profile'])->name('profile');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class , 'logout'])->name('logout') ;
Route::get('ver',  [App\Http\Controllers\CartaController::class, 'ver'])->name('ver');
Route::get('/', [App\Http\Controllers\CartaController::class, 'ver'])->name('ver');
Route::get('/config' , [App\Http\Controllers\ClienteController::class, 'config'])->name('config');
Route::post('/usuario/update' , [App\Http\Controllers\ClienteController::class, 'update'])->name('user.update');
Route::get('/usuario/delete' , [App\Http\Controllers\ClienteController::class, 'delete'])->name('user.delete');
Route::get('/buscar/{nombre?}' , [App\Http\Controllers\CartaController::class, 'buscar'])->name('buscar');
Route::get('/search', [App\Http\Controllers\CartaController::class, 'search1'])->name('search');
Route::get('/usuario/admin', [App\Http\Controllers\AdminController::class, 'admin_panel'])->name('admin_panel');
Route::get('/profile/{id}' ,  [App\Http\Controllers\ClienteController::class, 'profile'])->name('profile');
Route::post('/perfil' ,  [App\Http\Controllers\AdminController::class, 'perfil'])->name('perfil');
Route::get('/borrar' ,  [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete');