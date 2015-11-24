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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/test',function(){
//   return 'hello';
//});
//
////Premier paramètre, on peut avoir nom différente
//Route::get('/test/{name}','HomeController@index');

Route::get('/',[
    'as'=>'listLink',
    'uses'=>'LinkController@listLink'
]);

Route::get('/add',[
    'as'=>'addLink',
    'uses'=>'LinkController@addLink',
    'middleware' => 'auth'
]);

Route::post('/valid',[
    'as'=>'validLink',
    'uses'=>'LinkController@validLink'
]);

Route::match(['get','post'],'/update/{id}',[
    'as'=>'updateLink',
    'uses'=>'LinkController@updateLink'
]);

Route::get('/link/{id}',[
    'as'=>'showLink',
    'uses'=>'LinkController@showLink'
]);

Route::get('/delete/{id}',[
    'as'=>'deleteLink',
    'uses'=>'LinkController@deleteLink'
]);

//Routes pour l'enregistrement
Route::get('auth/register', [
    'as' => 'getRegister',
    'uses' => 'Auth\AuthController@getRegister'
]);
Route::post('auth/register', [
    'as' => 'postRegister',
    'uses' => 'Auth\AuthController@postRegister'
]);

//routes pour l'authentification
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

//Route de déconnexion
Route::get('auth/logout', 'Auth\AuthController@getLogout');