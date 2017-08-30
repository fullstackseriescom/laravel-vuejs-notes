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

Route::middleware(['guest'])->group(function () {
  Route::post('register', 'AuthenticateController@register');
  Route::post('login', 'AuthenticateController@login');
});

Route::post('refresh-token', 'AuthenticateController@refreshToken');

Route::middleware(['jwt.auth'])->group(function () {
  Route::resource('notes', 'NotesController');
  Route::post('logout', 'AuthenticateController@logout');
});
