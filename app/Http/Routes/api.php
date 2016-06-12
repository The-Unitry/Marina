<?php

Route::get('available-boxes/{start}/{end}', 'Api\BoxController@getAvailableBoxes');