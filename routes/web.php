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
    Route::get('/profile',              'ProfileController@index')->name('profiles.index');
    Route::get('/profile/create',       'ProfileController@create')->name('profiles.create');
    Route::post('/profile',             'ProfileController@store')->name('profiles.store');
    Route::post('/profile/link',        'ProfileController@storeProfileLink')->name('profiles.storeLink');
    Route::get('/profile/{id}',         'ProfileController@show')->name('profiles.show');
    Route::get('/profile/{id}/edit',    'ProfileController@edit')->name('profiles.edit');
    Route::patch('/profile/{id}',       'ProfileController@update')->name('profiles.update');
    Route::delete('/profile/{id}',      'ProfileController@destroy')->name('profiles.destroy');
});
