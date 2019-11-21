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

Route::get('/cadastrar', 'HomeController@cadastrar')->name('cadastrar');
Route::get('/projetos', 'ProjetoController@projetos')->name('projetos');


Auth::routes();

Route::get('/home', 'ProjetoController@index')->name('verprojetos');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/projetos', 'ProjetoController@index')->name('projetos');
Route::post('/apoiarprojeto', 'ApoiarProjetoController@store')->name('apoiarprojeto');
Route::get('/projetos/{projeto}', 'ProjetoController@show');
Route::get('/projetos/{projeto}/editar', 'ProjetoController@edit')->name('projetos.edit');


Route::post('/projetos', 'ProjetoController@update')->name('encerrarprojeto');



Route::delete('/projetos/{projeto}', 'ProjetoController@destroy')->name('projetos.destroy');
Route::post('/cadastrarprojeto', 'ProjetoController@store')->name('cadastrarprojeto'); 
