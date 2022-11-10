<?php

use App\Http\Controllers\API\ApiMovieController;
use App\Http\Controllers\API\ApiShiftController;
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


//Movies
Route::group([],function () {
    Route::get('movies', [ApiMovieController::class, 'index']);
    Route::get('movies/{id}', [ApiMovieController::class, 'getMovie']);

    Route::get('shifts', [ApiShiftController::class, 'index']);
    Route::get('shifts/{id}', [ApiShiftController::class, 'getShift']);
});
