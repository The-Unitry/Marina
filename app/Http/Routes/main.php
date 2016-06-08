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

// Boxes
Route::get('mijn-boxen', 'BoxController@index');

// Posts
Route::get('post/{slug}', 'PostController@show');

// Contact Form
Route::get('contact', 'ContactController@index');
Route::post('contact', 'ContactController@store');

// Events
Route::get('evenementen', 'EventController@index');

// Authentication
Route::auth();
