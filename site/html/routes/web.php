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

Route::get('/home', 'HomeController@index');

Route::group(['as' => 'cadastros.', 'prefix' => 'cadastros'], function()
{
    Route::get('/pesquisa/status/{status_id?}', ['as' => 'PorStatus', 'uses' => 'RequisicoesController@PorStatus']);
});
