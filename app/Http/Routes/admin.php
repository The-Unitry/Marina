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
Route::get('invoice/{invoice}/add-product', 'Admin\InvoiceController@addProduct');
Route::get('invoice/{invoice}/credit', 'Admin\InvoiceController@credit');

// Reservations
Route::resource('reservation', 'Admin\ReservationController');
Route::get('reservation/{reservation}/create-invoice', 'Admin\ReservationController@createInvoice');

// Boxes
Route::resource('box', 'Admin\BoxController');

// Boats
Route::resource('boat', 'Admin\BoatController');

// Users
Route::resource('user', 'Admin\UserController');

// Scaffolds
Route::resource('scaffold', 'Admin\ScaffoldController');

// Requests
Route::resource('request', 'Admin\RequestController');

// Settings
Route::get('setting', 'Admin\SettingController@index');
Route::patch('setting', 'Admin\SettingController@update');
