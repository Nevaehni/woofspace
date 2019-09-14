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

Auth::routes();

//Home page
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@getUser')->name('home.getuser');
Route::post('/home/{id}', 'HomeController@likedUser')->name('home.like');

//Edit profile page
Route::get('/edit', 'EditPageController@profileindex')->name('edit');
Route::post('/edit/update', 'EditPageController@updateUser')->name('edit.update');

// Route::get('/autocomplete', 'AutocompleteController@fetch');
// Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');

