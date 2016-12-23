<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/jobs', 'ApiController@jobs');

Route::get('/jobs/{provider}', 'ApiController@jobs');

Route::get('/providers', 'ApiController@providers');

Route::get('/users', 'ApiController@users');