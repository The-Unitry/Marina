<?php

// Welcome screen
Route::get('/', 'HomeController@index');

// My boats
Route::get('mijn-boten', 'BoatController@index');
Route::get('mijn-boten/nieuw', 'BoatController@create');
Route::post('mijn-boten', 'BoatController@store');

// Reserve
Route::get('reserveren', 'ReserveController@index');

// Contact Form
Route::get('contact', 'ContactController@index');

// Authentication
Route::auth();