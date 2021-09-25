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
Route::get('getLatestArticles','ArticleController@getLatestArticles');
Route::get('getArticle/{id}','ArticleController@getArticle');
Route::get('getArticlesForPagination','ArticleController@getArticlesForPagination');

//Route::get('getArticleComments/{id}','CommentsController@getArticleComments');
Route::post('addComment','CommentsController@addComment');
Route::post('addOpinion','CommentsController@addOpinion');
Route::post('reportComment','CommentsController@reportComment');
Route::post('reportOpinion','CommentsController@reportOpinion');
Route::post('deleteComment','CommentsController@deleteComment');
Route::post('deleteOpinion','CommentsController@deleteOpinion');
Route::get('getArticleComments/{id}','CommentsController@getArticleComments'); //Paginacja
Route::get('getWorkoutOpinions/{id}','CommentsController@getWorkoutOpinions'); //Paginacja
//Do zmiany: V
Route::get('getWorkoutRatings/{id}','CommentsController@getWorkoutRatings'); //Wyliczanie oceny planu do zmiany

Route::get('getUserWorkoutsForPagination','WorkoutController@getUserWorkoutsForPagination'); //Pobiera plany użytkownika do paginacji
Route::get('getUserFollowedWorkoutsForPagination','WorkoutController@getUserFollowedWorkoutsForPagination'); //Pobiera obserowane plany usera do paginacji
Route::get('getPublicWorkoutsForPagination','WorkoutController@getPublicWorkoutsForPagination'); // Pobiera wszystkie plany publiczne


Route::get('getWorkoutTypes','WorkoutController@getWorkoutTypes'); // Pobiera typy planów
Route::post('addWorkout','WorkoutController@addWorkout'); //Dodaje plan treningowy
Route::get('getWorkout/{id}','WorkoutController@getWorkout'); // Pobiera jeden plan o danym id

Route::get('likeWorkout/{id}','WorkoutController@likeWorkout'); // Lajkuje plan
Route::get('unlikeWorkout/{id}','WorkoutController@unlikeWorkout'); // unLajkuje plan
Route::get('followWorkout/{id}','WorkoutController@followWorkout'); // Followuje plan
Route::get('unfollowWorkout/{id}','WorkoutController@unfollowWorkout'); // Followuje plan


Route::get('getExercises','ExerciseController@getExercises');

Route::any('{something}', function () {
    return view('welcome');
})->where('something', '.*');





