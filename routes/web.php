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
Route::get('/',  'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'LoginController@logout')->name('logout') ;

/**
 * USER'S ROUTES
 */
Route::get('/profile/{id}' ,  'ClienteController@profile')->name('profile')->middleware('auth');
Route::post('/usuario/update' , 'ClienteController@update')->name('user.update')->middleware('auth');
Route::get('/usuario/delete' , 'ClienteController@delete')->name('user.delete')->middleware('auth');
Route::get('/profile/{id}' ,  'ClienteController@profile')->name('profile')->middleware('auth');
Route::get('/contacto', 'ClienteController@contacto')->name('contacto');
Route::get('/user/avatar/{filename}', 'ClienteController@getImagen')->name('user.avatar')->middleware('auth');
Route::get('pagination',  'PaginationController@index')->name('pagination');
Route::get('pagination/fetch_data', 'PaginationController@fetch_data')->name('fetch_data');

/**
 * CARD'S MENU
 */
Route::get('/ver',  'CartaController@ver')->name('ver');

/**
 * ORDER'S ROUTES
 */
Route::post('/producto/add' , 'PedidoController@add')->name('producto.add')->middleware('auth');
Route::get('/pedido/borrar/{id}' , 'PedidoController@borrar')->name('pedido.borrar')->middleware('auth');
Route::get('/pedido/pagar/{id}' , 'PedidoController@pagar')->name('pedido.pagar')->middleware('auth');
Route::get('producto/pagado', 'PedidoController@pagado')->name('pagado')->middleware('auth');
Route::get('reparto', 'PedidoController@ver_reparto')->name('ver_reparto')->middleware('auth');
Route::post('producto/repartido' , 'PedidoController@repartido')->name('repartido')->middleware('auth');
Route::post('show_pedido/' , 'PedidoController@show_pedido')->name('show_pedido')->middleware('auth');

/**
 * USER ADMIN'S ROUTES
 */
Route::get('/usuario/admin', 'AdminController@admin_panel')->name('admin_panel')->middleware('auth');
Route::get('/perfil' ,  'AdminController@perfil')->name('perfil')->middleware('auth');
Route::get('/borrar' ,  'AdminController@delete_user')->name('delete')->middleware('auth');
Route::get('/anadir' ,  'AdminController@anadir')->name('anadir')->middleware('auth');
Route::post('/add' ,  'AdminController@add_carta')->name('add')->middleware('auth');
Route::get('/producto/borrar/{id}' ,  'AdminController@delete_product')->name('product.delete')->middleware('auth');
Route::post('/product/update' , 'AdminController@edit_product')->name('producto.update')->middleware('auth');
Route::get('/edit/{id}' ,'AdminController@view_edit')->name('product.update')->middleware('auth');
Route::get('/chart' , 'AdminController@chartJS')->name('chart')->middleware('auth');
Route::get('/admin', 'AdminController@admin_panel')->name('admin_panel1')->middleware('auth');
Route::get('/admin_panel', 'PaginationController@index_admin')->name('administrador')->middleware('auth');
Route::get('pagination/fetch_admin_data', 'PaginationController@fetch_admin_data')->name('fetch_admin_data')->middleware('auth');