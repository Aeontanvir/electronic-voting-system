<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('parties', 'PartiesController');
Route::resource('areas', 'AreasController');
Route::resource('zones', 'ZonesController');
Route::resource('candidates', 'CandidatesController');
Route::resource('voters', 'VotersController');

Route::get('/ballots', 'BallotsController@index');

Route::get('/home', 'HomeController@index')->name('home');
