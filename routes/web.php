<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','AuthController@index');
Route::get('/unauthorised','AuthController@unauthorised');
Route::post('/login','AuthController@login');
Route::get('/logout','AuthController@logout');
Route::post('/register','AuthController@register');


Route::any('{slug}','AuthController@index')->where('slug', '([A-z\d-\/_.]+)?');



