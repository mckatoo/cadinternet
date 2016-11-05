<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index');

Auth::routes();

Route::post('/logout', 'Auth\LoginController@logout');

Route::get('/home',['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['as' => 'cadastros.', 'prefix' => 'cadastros'], function()
{
    Route::get('/pesquisa/status/{status_id?}', ['as' => 'PorStatus', 'uses' => 'RequisicoesController@PorStatus']);
    Route::get('/conta/{campo}/{valor}', ['as' => 'conta', 'uses' => 'RequisicoesController@Conta']);
    Route::get('/tipo/{tipo}', ['as' => 'tipo', 'uses' => 'RequisicoesController@PorTipo']);
    Route::post('/salvar', ['as' => 'salvar', 'uses' => 'RequisicoesController@Salvar']);
});

Route::group(['as' => 'campus.', 'prefix' => 'campus'], function()
{
    Route::get('/lista', ['as' => 'lista', 'uses' => 'CampusController@lista']);
});
