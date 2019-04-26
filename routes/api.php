<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();


});*/
Route::name('me')->get('users/me', 'UserController@me');
Route::name('login')->post('users/login', 'UserController@login');
Route::resource('users', 'UserController');
Route::resource('solicituds', 'SolicitudController');
Route::resource('empresas', 'EmpresaController');
Route::resource('carreras', 'CarreraController');

