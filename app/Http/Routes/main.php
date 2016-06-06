<?php

// Welcome screen
Route::get('/', 'HomeController@index');

// My boats
Route::get('mijn-boten', 'BoatController@index');
Route::get('mijn-boten/nieuw', 'BoatController@create');
Route::get('mijn-boten/{boat}', 'BoatController@edit');
Route::patch('mijn-boten/{boat}', 'BoatController@update');
Route::post('mijn-boten', 'BoatController@store');

// Reserve
Route::get('reserveren', 'ReservationController@index');

// Contact Form
Route::get('contact', 'ContactController@index');

// Authentication
Route::auth();