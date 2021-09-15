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

Route::get('getArticleCategories','ArticleController@getArticleCategories');
Route::post('addArticle','ArticleController@addArticle');
Route::get('getArticles','ArticleController@getArticles');
Route::get('getArticle/{id}','ArticleController@getArticle');

Route::get('getArticleComments/{id}','CommentsController@getArticleComments');
Route::post('addComment','CommentsController@addComment');
Route::post('reportComment','CommentsController@reportComment');
Route::post('reportOpinion','CommentsController@reportOpinion');

Route::get('getUserWorkouts','WorkoutController@getUserWorkouts');

Route::any('{something}', function () {
    return view('welcome');
})->where('something', '.*');





