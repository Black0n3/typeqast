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

// Home page
Route::get('/', function () {
    return view('sites.homepage');
})->name('web.homepage');

// Characters index
Route::get('/characters', 'CharacterController@index')->name('web.character');

// Character view by id
Route::get('/characters/{id}/', 'CharacterController@view')->name('web.character.view');

// Character view all his films
Route::get('/characters/{id}/films', 'CharacterController@films')->name('web.character.films');

// Film view
Route::get('/films/{id}', 'FilmController@view')->name('web.films.view');

// Starship view
Route::get('/starships', 'StarshipController@index')->name('web.starship');
