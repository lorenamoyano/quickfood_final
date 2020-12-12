<?php

use App\Models\Carta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('productos', 'ApiController@productos');
Route::get('producto/{id}', 'ApiController@producto');
Route::get('clientes', 'ApiController@usuarios');
Route::get('cliente/{id}', 'ApiController@usuario');
