<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/providers', 'ApiController@providers');

Route::get('/providers/{provider}/jobs', 'ApiController@providerJobs');

Route::get('/users', 'ApiController@users');
