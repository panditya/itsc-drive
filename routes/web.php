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

// Default Index
Route::get('/', 'HomeController@index')->name('home');
  Route::get('/file/{id}', 'HomeController@file')->name('file');
  Route::get('/profile', 'HomeController@profile')->name('profile');
// Handle Download
Route::post('/download/{id}', 'FileController@download')->name('download');
// Default Auth
Auth::routes();
// Social Auth
Route::get('oauth/{service}', 'Auth\LoginController@oauth');
Route::get('oauth/{service}/callback', 'Auth\LoginController@handleOauthCallback');

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
  // Report Type
  Route::resource('report-type', 'ReportTypeController');
  // User
  Route::resource('user', 'UserController');
});
