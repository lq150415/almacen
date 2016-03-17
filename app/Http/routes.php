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
    
        Route::resource('/', 'IndexController');
        Route::resource('index', 'IndexController');
        Route::resource('almacen', 'AlmacenController');
        Route::post('almacen/registrar', 'AlmacenController@store');
        Route::resource('alerta', 'AlertaController');
        Route::resource('consultapp', 'ConsultaController@index');
        Route::resource('consultapr', 'ConsultaController@index2');
        Route::resource('consultapu', 'ConsultaController@index3');
        Route::resource('consultapf', 'ConsultaController@index4');
        Route::resource('ingreso', 'IngresoController');
        Route::resource('producto', 'ProductoController');
        Route::resource('respuesta', 'RespuestaController@index');
        Route::resource('rubro', 'RubroController');
        Route::resource('solicitud', 'SolicitudController@index');
        Route::resource('usuario', 'UsuarioController');
        Route::post('usuario/registrar', 'UsuarioController@store');
        Route::resource('indexcl', 'IndexController@index2');
        Route::resource('respuestacl', 'RespuestaController@indexcl');
        Route::resource('solicitudcl', 'SolicitudController@indexcl');    
        Route::resource('solacepcl', 'SolicitudController@indexclac');  
        Route::resource('solreccl', 'SolicitudController@indexclrec');  
});



