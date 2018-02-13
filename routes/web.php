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

Route::get('/', 'HomeController@index');
Route::post('/download/{id}', 'FileController@download')->name('download');
// Default Auth
Auth::routes();
// Social Auth
Route::get('auth/social', 'Auth\SocialController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialController@handleProviderCallback')->name('social.callback');

// Redirect if not logged
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
  // Dashboard
  Route::get('/', 'HomeController@dashboard')->name('dashboard');
  // Category
  Route::resource('category', 'CategoryController');
  // File
  Route::resource('file', 'FileController');
  // Report
  Route::resource('report', 'ReportController');
  // User
  Route::resource('user', 'UserController');
});
