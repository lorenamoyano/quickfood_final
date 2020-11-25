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

Route::get('/', function () {
    return view('home');
});

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

Route::get('login' , function() {
    $title = "Login";

    return view('users.login' , array(
        'login' => $title
    ));
});

Auth::routes();

//Route::match(['get','post'], '/ver', [App\Http\Controllers\CartaController::class, 'ver'])->name('ver');
Route::get('/',  [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}' ,  [App\Http\Controllers\ClienteController::class, 'profile'])->name('profile');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class , 'logout'])->name('logout') ;
Route::get('/ver',  [App\Http\Controllers\CartaController::class, 'ver'])->name('ver');
Route::post('/usuario/update' , [App\Http\Controllers\ClienteController::class, 'update'])->name('user.update');
Route::get('/usuario/delete' , [App\Http\Controllers\ClienteController::class, 'delete'])->name('user.delete');
Route::get('/buscar/{nombre?}' , [App\Http\Controllers\CartaController::class, 'buscar'])->name('buscar');
Route::get('/search', [App\Http\Controllers\CartaController::class, 'search1'])->name('search');
Route::get('/usuario/admin', [App\Http\Controllers\AdminController::class, 'admin_panel'])->name('admin_panel');
Route::get('/profile/{id}' ,  [App\Http\Controllers\ClienteController::class, 'profile'])->name('profile');
Route::post('/perfil' ,  [App\Http\Controllers\AdminController::class, 'perfil'])->name('perfil');
Route::get('/borrar' ,  [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete');
Route::get('/anadir' ,  [App\Http\Controllers\AdminController::class, 'anadir'])->name('anadir');
Route::post('/add' ,  [App\Http\Controllers\AdminController::class, 'add_carta'])->name('add');
Route::get('/search1', [App\Http\Controllers\CartaController::class, 'index'])->name('search');
Route::get('/autocomplete', [App\Http\Controllers\CartaController::class, 'autocomplete'])->name('autocomplete');
Route::get('/product', [App\Http\Controllers\CartaController::class, 'product_show'])->name('product');
Route::get('/producto/borrar/{id}' ,  [App\Http\Controllers\AdminController::class, 'delete_product'])->name('product.delete');
Route::post('/product/update' , [App\Http\Controllers\AdminController::class, 'edit_product'])->name('producto.update');
Route::get('/edit/{id}' , [App\Http\Controllers\AdminController::class, 'view_edit'])->name('product.update');
Route::get('/cesta' , [App\Http\Controllers\CartaController::class, 'cesta'])->name('cesta');
Route::post('/producto/add' ,  [App\Http\Controllers\PedidoController::class, 'add'])->name('producto.add');
Route::get('/carrito/{id}' , [App\Http\Controllers\PedidoController::class, 'carrito'])->name('carrito');
Route::get('/pedido/borrar/{id}' ,  [App\Http\Controllers\PedidoController::class, 'borrar'])->name('pedido.borrar');
Route::get('/pedido/pagar/{id}' ,  [App\Http\Controllers\PedidoController::class, 'pagar'])->name('pedido.pagar');
Route::get('/contacto', [App\Http\Controllers\ClienteController::class, 'contacto'])->name('contacto');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\ClienteController::class, 'getImagen'])->name('user.avatar');
