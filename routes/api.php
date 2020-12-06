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


Route::get('client','ApiController@getAllClients');
Route::get('client/{name}','ApiController@getClient');
Route::post('client','ApiController@createClient');
Route::put('client/{id}','ApiController@updateClient');
Route::delete('client/{id}','ApiController@deleteClient');




Route::post('register','JwtAuthController@register');
Route::get('user-info','JwtAuthController@getAllUsers');

