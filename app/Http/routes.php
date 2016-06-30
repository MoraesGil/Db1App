<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// exemplo de rotas comuns
// Route::get('products','ProductController@index');
// Route::get('products/create','ProductController@create');
// Route::get('products/{id}/editar','ProductController@edit');

//prefiro utilizar o resource que cria as rotas index,create,store,show,edit,update,destroy
//na resource a baixo eu removi a rota show pois nao irei recuperar o produto para exibir detalhes..
Route::resource('products', 'ProductController',['except' => ['show']]);
