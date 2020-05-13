<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('import-zip', 'Api\ImportZipController@import');

Route::prefix('search-zip')->group(function () {

    Route::post('zip', 'Api\SearchZipController@searchByZip');
    Route::post('city', 'Api\SearchZipController@searchByCity');

});


