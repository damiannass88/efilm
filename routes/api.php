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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('movies', 'ApiController@index');
Route::get('movies/{id}', 'ApiController@show');
Route::post('movies', 'ApiController@store');
Route::put('movies/{id}', 'ApiController@update');
Route::delete('movies/{id}', 'ApiController@destroy');
Route::get('movies/search/{title}', 'ApiController@searchTitle');