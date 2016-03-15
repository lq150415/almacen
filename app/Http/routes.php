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

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
 
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('index', 'IndexController@index');
    Route::get('indexcl', 'IndexController@index2');
    Route::get('almacen', 'AlmacenController@index');
    Route::get('alerta', 'AlertaController@index');
    Route::get('consultapp', 'ConsultaController@index');
    Route::get('consultapr', 'ConsultaController@index2');
    Route::get('consultapu', 'ConsultaController@index3');
    Route::get('consultapf', 'ConsultaController@index4');
    Route::get('ingreso', 'IngresoController@index');
    Route::get('producto', 'ProductoController@index');
    Route::get('respuesta', 'RespuestaController@index');
    Route::get('respuestacl', 'RespuestaController@indexcl');
    Route::get('rubro', 'RubroController@index');
    Route::get('solicitud', 'SolicitudController@index');
    Route::get('solicitudcl', 'SolicitudController@indexcl');    
    Route::get('solacepcl', 'SolicitudController@indexclac');  
    Route::get('solreccl', 'SolicitudController@indexclrec');  
    Route::get('usuario', 'UsuarioController@index');
});



