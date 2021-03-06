<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'LandingController@index');




//creates auth routes for users
Auth::routes(['verify' => true]);
//user logged in
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');











//admin prefix
Route::prefix('admin')->group(function()
{
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  //  Password reset Route
  Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


//
Route::get('/sports', 'SportController@showSports')->name('sports');
Route::post('/storeSport', 'SportController@store')->name('storeSport');
//
Route::get('/sportsCategories', 'SportCategoryController@showSportsCategories')->name('sportsCategories');
Route::post('/storeSportCategory', 'SportCategoryController@store')->name('storeSportCategory');
//
Route::get('/showCompetitions/{sportId}/category/{categoryId?}', 'CompetitionController@competitiosByCategory')->name('showCompetitions');
Route::post('/storeCompetition', 'CompetitionController@store')->name('storeCompetition');
//
Route::get('/adminShowEvents/{sport?}', 'EventController@adminShowEvents')->name('adminShowEvents');
Route::post('/storeEvent', 'EventController@store')->name('storeEvent');

});
