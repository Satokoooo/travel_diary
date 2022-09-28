<?php

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
    return view('welcome');
});

Route::get('diary/create','App\Http\Controllers\DiaryController@add')->middleware('auth');
Route::get('diary/edit','App\Http\Controllers\DiaryController@edit')->middleware('auth');
Route::get('profile/create','App\Http\Controllers\ProfileController@add')->middleware('auth');
Route::get('profile/edit','App\Http\Controllers\ProfileController@edit')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
