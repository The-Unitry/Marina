<?php

// Application dashboard
Route::get('/', 'Admin\AdminController@index');

// Posts
Route::resource('post', 'Admin\PostController');

// Pages
Route::resource('page', 'Admin\PageController');
