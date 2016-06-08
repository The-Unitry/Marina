<?php

// Application dashboard
Route::get('/', 'Admin\AdminController@index');

// Posts
Route::resource('post', 'Admin\PostController');

// Pages
Route::resource('page', 'Admin\PageController');

// Invoices
Route::resource('invoice', 'Admin\InvoiceController');
Route::get('invoice/{invoice}/view', 'Admin\InvoiceController@view');

// Reservations
Route::resource('reservation', 'Admin\ReservationController');

// Boxes
Route::resource('box', 'Admin\BoxController');

// Boats
Route::resource('boat', 'Admin\BoatController');

// Users
Route::resource('user', 'Admin\UserController');

// Scaffolds
Route::resource('scaffold', 'Admin\ScaffoldController');

// Settings
Route::get('setting', 'Admin\SettingController@index');
Route::patch('setting', 'Admin\SettingController@update');

// Newsletters
Route::get('newsletter', 'Admin\NewsletterController@index');
