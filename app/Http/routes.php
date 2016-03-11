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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('almacen', function(){
    return view('almacen');
});
Route::get('rubro', function(){
    return view('rubro');
});
Route::get('producto', function(){
    return view('producto');
});
Route::get('usuario', function(){
    return view('usuario');
});
Route::get('consultapr', function(){
    return view('consulta/consultaporrubro');
});
Route::get('consultapp', function(){
    return view('consulta/consultaporproducto');
});
Route::get('consultapu', function(){
    return view('consulta/consultaporusuario');
});
Route::get('consultapf', function(){
    return view('consulta/consultaporfecha');
});
Route::get('solicitud', function(){
    return view('solicitud');
});
Route::get('respuesta', function(){
    return view('respuesta');
});
Route::get('ingreso', function(){
    return view('ingreso');
});
Route::get('index', function(){
    return view('index');
});
Route::get('alerta', function(){
    return view('alertas');
});

Route::get('login', function(){
    return view('login');
});

Route::get('indexcl', function(){
    return view('cliente/index_clie');
});

Route::get('solicitudcl', function(){
    return view('cliente/form_sol');
});
Route::get('respuestacl', function(){
    return view('cliente/resp_sol');
});
Route::get('solacepcl', function(){
    return view('cliente/sol_ace');
});
Route::get('solreccl', function(){
    return view('cliente/sol_rec');
});
