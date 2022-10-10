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

Route::get('diary',[App\Http\Controllers\DiaryController::class, 'index'])->name('diary.index')->middleware('auth');
Route::get('/show/{id}', [App\Http\Controllers\DiaryController::class, 'show'])->name('diary.show');
Route::get('diary/create','App\Http\Controllers\DiaryController@add')->middleware('auth');
Route::post('diary/create','App\Http\Controllers\DiaryController@create')->name('diary.create');
Route::get('diary/edit/{id}',[App\Http\Controllers\DiaryController::class, 'edit'])->name('diary.edit')->middleware('auth');
Route::post('/update/{id}', [App\Http\Controllers\DiaryController::class, 'update'])->name('diary.update');
Route::get('profile/create','App\Http\Controllers\ProfileController@add')->middleware('auth');
Route::get('profile/edit','App\Http\Controllers\ProfileController@edit')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');