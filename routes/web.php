<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeasiswaController;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(BeasiswaController::class)->group(function () {
    Route::get('/beasiswa', 'index')->name('beasiswa');
    Route::get('/beasiswa-loadData', 'loadData')->name('beasiswa-loadData');
    Route::post('/beasiswa-store', 'store')->name('beasiswa-store');
    Route::get('/beasiswa-edit', 'edit')->name('beasiswa-edit');
    Route::post('/beasiswa-update', 'update')->name('beasiswa-update');
    Route::post('/beasiswa-delete', 'delete')->name('beasiswa-delete');
});