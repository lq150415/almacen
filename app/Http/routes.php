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
        Route::get('almacen', ['as'=>'almacen','uses'=>'AlmacenController@Index']);
        Route::post('elialmacen','AlmacenController@elialmacen');
        Route::post('almacen/registrar', 'AlmacenController@store');
        Route::resource('alerta', 'AlertaController');
        Route::resource('consultapp', 'ConsultaController@index');
        Route::resource('consultapr', 'ConsultaController@index2');
        Route::resource('consultapu', 'ConsultaController@index3');
        Route::resource('consultapf', 'ConsultaController@index4');
        Route::resource('ingreso', 'IngresoController');
        Route::resource('salida', 'SalidaController');
        Route::resource('producto', 'ProductoController');
        Route::get('rubro/producto/{id}',['as'=>'producto','uses'=>'ProductoController@Index'])->where(['id' => '[0-9]+']);
        Route::post('rubro/producto/{id}/registro','ProductoController@Store');
        Route::post('rubro/producto/{id}/eliproducto','ProductoController@eliproducto');
        Route::post('rubro/producto/{id}/modificacion','ProductoController@modificacion');
        Route::post('reg_ingreso','IngresoController@Store');
        Route::post('reg_salida','SalidaController@Store');
        Route::post('reg_solicitud',['as'=>'reg_solicitud','uses'=>'SolicitudController@store']);
        Route::resource('respuesta', 'RespuestaController@index');
        Route::get('rubro/{id}',['as'=>'rubro','uses'=>'RubroController@Index'])->where(['id' => '[0-9]+']);
        Route::post('datos_rub','IngresoController@datos_rub');
        Route::post('datos_pro','IngresoController@datos_pro');
        Route::post('datos_prosal','SalidaController@datos_prosal');
        Route::post('datos_pro2','IngresoController@datos_pro2'); 
        Route::post('rubro/{id}/registro','RubroController@store');
        Route::post('rubro/{id}/elirubro','RubroController@elirubro');
        Route::post('verificausuario','UsuarioController@verificausuario');
        Route::resource('solicitud', 'SolicitudController');
        Route::resource('solicitudes', 'SolicitudController');
        Route::get('solicitudes', ['as'=>'solicitudes','uses'=>'SolicitudController@index2']);
        Route::get('solicitud', ['as'=>'solicitud','uses'=>'SolicitudController@index']);
        Route::post('httpush', 'SolicitudController@httpush');
        Route::post('httpush2', 'SolicitudController@httpush2');
        Route::post('notificaciones','SolicitudController@notificaciones');
        Route::post('notificacionescount','SolicitudController@notificacionescount');
        Route::post('notificacionescountjrh','SolicitudController@notificacionescountjrh');
        Route::post('notificacionesleidas','SolicitudController@notificacionesleidas');
        Route::post('notificacionesalerta','SolicitudController@notificacionesalerta');
        Route::post('prod_sol','SolicitudController@prod_sol');
        Route::post('prod_sol3','SolicitudController@prod_sol3');
        Route::post('prod_sol2','NotificacionController@prod_sol2');
        Route::resource('usuario', 'UsuarioController');
        Route::post('usuario/registrar', 'UsuarioController@store');
        Route::post('eliusuario', 'UsuarioController@eliusuario');
        Route::resource('solacepcl', 'SolicitudController@indexclac');
        Route::resource('notificacionescl', 'NotificacionController');
        Route::get('notificacionescl', ['as'=>'notificacionescl','uses'=>'NotificacionController@index']);
        Route::resource('solreccl', 'SolicitudController@indexclrec');  
        Route::post('enviarevision','SolicitudController@enviarevision');
        Route::post('nuevoprecio','IngresoController@nuevoprecio');
        Route::post('aprobarsolicitud','NotificacionController@aprobar');
        Route::post('rechazarsolicitud','NotificacionController@rechazar');
        Route::post('respuestascount','SolicitudController@respuestascount');
        Route::post('respuestascount2','SolicitudController@respuestascount2');
        Route::get('kardexpdf/{id}','ReporteController@kardexpdf');
        Route::get('saldospdf','ReporteController@salidaspdf');
        Route::resource('kardex','ReporteController');
        Route::get('kardex','ReporteController@index');
});



