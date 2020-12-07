<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

/**
 * ROUTES HOME
 */
Route::get('/',  [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * USER'S ROUTES
 */
Route::get('/profile/{id}' ,  [App\Http\Controllers\ClienteController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class , 'logout'])->name('logout') ;
Route::post('/usuario/update' , [App\Http\Controllers\ClienteController::class, 'update'])->name('user.update')->middleware('auth');
Route::get('/usuario/delete' , [App\Http\Controllers\ClienteController::class, 'delete'])->name('user.delete')->middleware('auth');
Route::get('/profile/{id}' ,  [App\Http\Controllers\ClienteController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/contacto', [App\Http\Controllers\ClienteController::class, 'contacto'])->name('contacto')->middleware('auth');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\ClienteController::class, 'getImagen'])->name('user.avatar')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin_panel'])->name('admin_panel1')->middleware('auth');
Route::get('pagination/fetch_data', [App\Http\Controllers\AdminController::class, 'fetch_data'])->name('fetch_data')->middleware('auth');
Route::get('pagination',  [App\Http\Controllers\PaginationController::class, 'index'])->name('pagination');
Route::get('pagination/fetch_data', [App\Http\Controllers\PaginationController::class, 'fetch_data'])->name('fetch_data');

/**
 * CARD'S MENU
 */
Route::get('/ver',  [App\Http\Controllers\CartaController::class, 'ver'])->name('ver');
Route::post('/producto/add' ,  [App\Http\Controllers\PedidoController::class, 'add'])->name('producto.add')->middleware('auth');
Route::get('/pedido/borrar/{id}' ,  [App\Http\Controllers\PedidoController::class, 'borrar'])->name('pedido.borrar')->middleware('auth');
Route::get('/pedido/pagar/{id}' ,  [App\Http\Controllers\PedidoController::class, 'pagar'])->name('pedido.pagar')->middleware('auth');
Route::get('producto/pagado', [App\Http\Controllers\PedidoController::class, 'pagado'])->name('pagado')->middleware('auth');
Route::get('reparto', [App\Http\Controllers\PedidoController::class, 'ver_reparto'])->name('ver_reparto')->middleware('auth');
Route::post('producto/repartido' ,  [App\Http\Controllers\PedidoController::class, 'repartido'])->name('repartido')->middleware('auth');
Route::post('show_pedido/' ,  [App\Http\Controllers\PedidoController::class, 'show_pedido'])->name('show_pedido')->middleware('auth');

/**
 * USER ADMIN'S ROUTES
 */
Route::get('/usuario/admin', [App\Http\Controllers\AdminController::class, 'admin_panel'])->name('admin_panel')->middleware('auth');
Route::get('/perfil' ,  [App\Http\Controllers\AdminController::class, 'perfil'])->name('perfil')->middleware('auth');
Route::get('/borrar' ,  [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete')->middleware('auth');
Route::get('/anadir' ,  [App\Http\Controllers\AdminController::class, 'anadir'])->name('anadir')->middleware('auth');
Route::post('/add' ,  [App\Http\Controllers\AdminController::class, 'add_carta'])->name('add')->middleware('auth');
Route::get('/producto/borrar/{id}' ,  [App\Http\Controllers\AdminController::class, 'delete_product'])->name('product.delete')->middleware('auth');
Route::post('/product/update' , [App\Http\Controllers\AdminController::class, 'edit_product'])->name('producto.update')->middleware('auth');
Route::get('/edit/{id}' , [App\Http\Controllers\AdminController::class, 'view_edit'])->name('product.update')->middleware('auth');
Route::get('/chart' , [App\Http\Controllers\AdminController::class, 'chartJS'])->name('chart')->middleware('auth');

/**
 * API'S ROUTES
 */

Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});

Route::get('productos', [App\Http\Controllers\ApiController::class, 'product'])->middleware('auth');
Route::get('producto/{id}', [App\Http\Controllers\ApiController::class, 'producto'])->middleware('auth');
Route::get('clientes', [App\Http\Controllers\ApiController::class, 'usuarios'])->middleware('auth');
Route::get('cliente/{id}', [App\Http\Controllers\ApiController::class, 'usuario'])->middleware('auth');