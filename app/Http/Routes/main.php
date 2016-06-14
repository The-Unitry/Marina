<?php

// Welcome screen
Route::get('/', 'HomeController@index');

// My boats
Route::get('mijn-boten', 'BoatController@index');
Route::get('mijn-boten/nieuw', 'BoatController@create');
Route::get('mijn-boten/{boat}', 'BoatController@edit');
Route::patch('mijn-boten/{boat}', 'BoatController@update');
Route::post('mijn-boten', 'BoatController@store');
Route::get('mijn-boten/{boat}/delete', 'BoatController@destroy');

// Reserve
Route::get('reserveren', 'ReservationController@index');
Route::get('reserveren/bedankt', 'ReservationController@thanks');
Route::post('reserveren', 'ReservationController@boxes');
Route::get('reserveren/store/{boat}/{start}/{end}/{amount_of_persons}/{box}', 'ReservationController@store');

// Boxes
Route::get('mijn-boxen', 'BoxController@index');

// Posts
Route::get('nieuws', 'BlogController@index');
Route::get('nieuws/{slug}', 'BlogController@show');

// Contact Form
Route::get('contact', 'ContactController@index');
Route::post('contact', 'ContactController@store');

// Events
Route::get('evenementen', 'EventController@index');

// Crane planning
Route::get('kraanplan', 'CraneController@index');

// Authentication
Route::auth();

// User preferences
Route::get('voorkeuren', 'UserController@index');
Route::patch('voorkeuren', 'UserController@update');