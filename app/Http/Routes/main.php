<?php

Route::get('/', 'HomeController@index');
Route::get('mijn-boten', 'BoatController@index');
Route::get('reserveren', 'ReserveController@index');
Route::get('contact', 'ContactController@index');

Route::auth();