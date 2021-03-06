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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/events/{sport_id?}', 'EventController@index');
Route::get('/sports', 'SportController@index');

//
Route::get('/sportCategories/{id?}', 'SportController@sportCategories');
Route::get('/competitions/{id?}', 'SportCategoryController@competitions');
Route::get('/teamsByCategory/{id?}', 'TeamController@teamsByCategory');
