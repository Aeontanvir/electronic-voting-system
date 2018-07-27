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
Route::post('/ballots/voter', 'BallotsController@voterStatus');
Route::get('/ballots/voter', 'BallotsController@index');
Route::post('/ballots/take', 'BallotsController@take');
Route::get('/ballots', 'BallotsController@index');
Route::post('/ballots/vote', 'BallotsController@vote');

Route::get('/ballots/area', 'BallotsController@area');
Route::post('/ballots/result', 'BallotsController@result');

Route::get('/home', 'HomeController@index')->name('home');
