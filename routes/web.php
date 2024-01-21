<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('home', HomeController::class);
Route::resource('thongbao', \App\Http\Controllers\TableThongbaoController::class);

Route::post('thongbao', [\App\Http\Controllers\TableThongbaoController::class, 'addThongBao'])->name('add-thong-bao');
