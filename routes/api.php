<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home1/texto/{id_texto}','IndexController@textos'); 
Route::get('/home1/texto-editar/{id_texto}','IndexController@editar_textos'); 
Route::get('/home1/texto/preguntas_respuestas/{fecha}/{id_personal}','IndexController@preguntas_respuestas'); 
Route::get('/home1/personal/textos_personal/{fecha}/{id_texto}','IndexController@texto_personal'); 
Route::get('/home1/personal/textos_personal/{fecha}','IndexController@texto_personal_solo_fecha'); 
Route::get('/home1/personal/editar_personal/{id_personal}','IndexController@editar_personal_api'); 
Route::get('/home1/personal/validar/{cedula}','IndexController@personal'); 
