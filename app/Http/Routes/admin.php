<?php

// Application dashboard
Route::get('/', 'Admin\AdminController@index');

// Posts
Route::resource('post', 'Admin\PostController');

// Pages
Route::resource('page', 'Admin\PageController');

// Invoices
Route::resource('invoice', 'Admin\InvoiceController');

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
