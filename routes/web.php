<?php

use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

Route::resource('posts','PostController');

Route::resource('menus','MenuController');

Route::resource('clientes','ClienteController');

Route::resource('facturas','FacturaController');

Route::resource('ordenes','OrdenController');

Route::resource('pagos','PagosController');