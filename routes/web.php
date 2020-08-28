<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::get('/','IndexController@index')->name('home2');

Route::group(['namespace' => 'Auth'], function () {

    //autenticacion
    Route::post('/administracion', 'LoginController@login')->name('iniciar'); 
    Route::post('logout', 'LoginController@logout');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/administracion', 'LoginController@login')->name('iniciar'); 

Route::post('/home/registrar-personal','IndexController@registrar_personal')->name('registrar_personal');
Route::post('/home/guardar-encuenta','IndexController@guardar_encuesta')->name('guardar_encuenta');

//administracion
Route::get('/administracion','IndexController@index_administracion')->name('administracion');
Route::post('/administracion/crear-texto','IndexController@crear_texto')->name('crear_texto');
Route::post('/administracion/editar-texto','IndexController@editar_texto')->name('editar_texto');
Route::delete('/administracion/eliminar-texto/{id_texto}','IndexController@eliminar_texto');
//Route::get('/administracion/eliminar-pregunta/{id_pregunta}','IndexController@eliminar_pregunta')->name('eliminar_pregunta');
Route::post('/administracion/anadir-respuesta','IndexController@anadir_respuesta')->name('anadir_respuesta');
Route::post('/administracion/eliminar-pregunta/{id_pregunta}','IndexController@eliminar_pregunta');


