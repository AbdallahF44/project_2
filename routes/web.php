<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('a4/admin')->group(function () {
    Route::view('', 'a4.parent');
    Route::resource('cities', CityController::class);
    Route::resource('categories', CategoryController::class);
});
Route::fallback(function () {
    return view('a4.not-found');
});
