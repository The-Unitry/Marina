<?php

// Application dashboard
Route::get('/', 'Admin\AdminController@index');

// Posts
Route::resource('post', 'Admin\PostController');

// Pages
Route::resource('page', 'Admin\PageController');

// Boxes
Route::get('document', 'Admin\DocumentController@index');

// Invoices
Route::get('invoice/export', 'Admin\InvoiceExportController@index');
Route::get('invoice/export/{start}/{end}', 'Admin\InvoiceExportController@export');
Route::resource('invoice', 'Admin\InvoiceController');
Route::get('invoice/{invoice}/view', 'Admin\InvoiceController@view');
Route::get('invoice/{invoice}/add', 'Admin\InvoiceController@addProduct');
Route::get('invoice/{invoice}/delete/{product}', 'Admin\InvoiceController@destroyProduct');
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

// Statistics
Route::get('statistics', 'Admin\StatisticsController@index');

// Scaffolds
Route::resource('scaffold', 'Admin\ScaffoldController');

// Requests
Route::resource('request', 'Admin\RequestController');

// Newsletters
Route::get('newsletter/send', 'Admin\NewsletterController@index');
Route::post('newsletter/send', 'Admin\NewsletterController@store');

// Settings
Route::get('setting', 'Admin\SettingController@index');
Route::patch('setting', 'Admin\SettingController@update');
