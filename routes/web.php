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
Route::post('userEdit','AuthController@userEdit');
Route::post('changeUserPassword','AuthController@changeUserPassword');


Route::get('getArticleCategories','ArticleController@getArticleCategories');
Route::post('addArticle','ArticleController@addArticle');
Route::post('editArticle','ArticleController@editArticle');
Route::post('deleteArticle','ArticleController@deleteArticle');
Route::get('getLatestArticles','ArticleController@getLatestArticles');
Route::get('getArticle/{id}','ArticleController@getArticle');
Route::get('getArticlesForPagination','ArticleController@getArticlesForPagination');
Route::get('getUserArticlesForPagination','ArticleController@getUserArticlesForPagination');


Route::post('addComment','CommentsController@addComment');
Route::post('addOpinion','CommentsController@addOpinion');
Route::post('reportComment','CommentsController@reportComment');
Route::post('reportOpinion','CommentsController@reportOpinion');
Route::post('deleteComment','CommentsController@deleteComment');
Route::post('deleteOpinion','CommentsController@deleteOpinion');
Route::get('getArticleComments/{id}','CommentsController@getArticleComments'); //Paginacja
Route::get('getWorkoutOpinions/{id}','CommentsController@getWorkoutOpinions'); //Paginacja
//Do zmiany: V
Route::get('getWorkoutRating/{id}','CommentsController@getWorkoutRating'); //Wyliczanie oceny planu do zmiany

Route::get('getUserWorkouts','WorkoutController@getUserWorkouts'); // pobiera plany usera
Route::get('getUserWorkoutsForPagination','WorkoutController@getUserWorkoutsForPagination'); //Pobiera plany użytkownika do paginacji
Route::get('getUserFollowedWorkoutsForPagination','WorkoutController@getUserFollowedWorkoutsForPagination'); //Pobiera obserowane plany usera do paginacji
Route::get('getPublicWorkoutsForPagination','WorkoutController@getPublicWorkoutsForPagination'); // Pobiera wszystkie plany publiczne

Route::get('getBestWorkouts','WorkoutController@getBestWorkouts'); // 4 najlepsze na stronę główną
Route::get('getWorkoutTypes','WorkoutController@getWorkoutTypes'); // Pobiera typy planów
Route::post('addWorkout','WorkoutController@addWorkout'); //Dodaje plan treningowy
Route::post('editWorkout','WorkoutController@editWorkout'); //Edytuje plan treningowy
Route::post('deleteWorkout','WorkoutController@deleteWorkout'); //Usuwa plan treningowy
Route::get('getWorkout/{id}','WorkoutController@getWorkout'); // Pobiera jeden plan o danym id

Route::get('likeWorkout/{id}','WorkoutController@likeWorkout'); // Lajkuje plan
Route::get('unlikeWorkout/{id}','WorkoutController@unlikeWorkout'); // unLajkuje plan
Route::get('followWorkout/{id}','WorkoutController@followWorkout'); // Followuje plan
Route::get('unfollowWorkout/{id}','WorkoutController@unfollowWorkout'); // Unfollowuje plan

Route::get('getPlanedWorkouts','WorkoutController@getPlanedWorkouts'); // Pobiera dane do rozpiski tygodniowej
Route::post('editPlanner','WorkoutController@editPlanner'); // Pobiera dane do rozpiski tygodniowej
Route::get('getTodaysWorkout','WorkoutController@getTodaysWorkout');

Route::get('getMeasurments','MeasurmentsController@getMeasurments');
Route::get('getLatestUserWeight','MeasurmentsController@getLatestUserWeight');
Route::get('getUserWeight','MeasurmentsController@getUserWeight');
Route::post('addNewMeasurment','MeasurmentsController@addNewMeasurment');
Route::post('deleteMeasurment','MeasurmentsController@deleteMeasurment');

Route::post('addStatistics','StatisticsController@addStatistics');
Route::get('getUserStats','StatisticsController@getUserStats');
Route::post('deleteStats','StatisticsController@deleteStats');

Route::get('getExercises','ExerciseController@getExercises');
Route::get('getSystemExercises','ExerciseController@getSystemExercises');
Route::get('getUserExercises','ExerciseController@getUserExercises');
Route::post('addNewExercise','ExerciseController@addNewExercise');
Route::post('deleteExercise','ExerciseController@deleteExercise');

Route::any('{something}', function () {
    return view('welcome');
})->where('something', '.*');





