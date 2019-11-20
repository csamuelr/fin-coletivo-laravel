<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/projetos', 'ProjetoController@index')->name('projetos');
Route::post('/projetos', 'ProjetoController@store');
Route::get('/projetos/{projeto}', 'ProjetoController@show');
Route::get('/projetos/{projeto}/editar', 'ProjetoController@edit')->name('projetos.edit');
Route::patch('/projetos/{projeto}', 'ProjetoController@update');
Route::delete('/projetos/{projeto}', 'ProjetoController@destroy')->name('projetos.destroy');
