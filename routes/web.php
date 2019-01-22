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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    // Dashboard Routes
    Route::get('/home', 'HomeController@index')->name('home');

    // Profile Controller Routes (CRUD)
    Route::get('/profile',              'ProfileController@index');
    Route::get('/profile/create',       'ProfileController@create');
    Route::post('/profile',             'ProfileController@store');
    Route::get('/profile/{id}',         'ProfileController@show');
    Route::get('/profile/{id}/edit',    'ProfileController@edit');
    Route::put('/profile/{id}',         'ProfileController@update');
    Route::delete('/profile/{id}',      'ProfileController@destroy');
});


