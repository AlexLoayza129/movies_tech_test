<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::resource('movies', MovieController::class);
    Route::group(['prefix' => 'movies', 'as' => 'movies.'], function(){
        Route::post('change', [MovieController::class,'change'])->name('change');
        Route::post('destroy', [MovieController::class,'destroy'])->name('destroy');
        Route::post('edit', [MovieController::class,'edit'])->name('edit');
        Route::post('update', [MovieController::class,'update'])->name('update');
    });

    Route::resource('shifts', ShiftController::class);
    Route::group(['prefix' => 'shifts', 'as' => 'shifts.'], function(){
        Route::post('change', [ShiftController::class,'change'])->name('change');
        Route::post('destroy', [ShiftController::class,'destroy'])->name('destroy');
        Route::post('edit', [ShiftController::class,'edit'])->name('edit');
        Route::post('update', [ShiftController::class,'update'])->name('update');
    });

});


