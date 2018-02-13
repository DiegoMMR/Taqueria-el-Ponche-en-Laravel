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
Auth::routes();

Route::group(['middleware' => ['web']], function () {
   
    Route::get('/', function () {
    return view('home');
});

Route::resource('posts','PostController');

Route::resource('menus','MenuController');

Route::resource('clientes','ClienteController');

Route::resource('facturas','FacturaController');

Route::resource('ordenes','OrdenController');

Route::resource('pagos','PagosController');

Route::get('/home', 'HomeController@index')->name('home');

});