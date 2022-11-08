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
    return view('auth.login');
});

Route::get('/diary',[App\Http\Controllers\DiaryController::class, 'index'])->name('diary.index')->middleware('auth');
Route::get('/show/{id}', [App\Http\Controllers\DiaryController::class, 'show'])->name('diary.show')->middleware('auth');
Route::get('diary/create',[App\Http\Controllers\DiaryController::class, 'add'])->name('diary.add')->middleware('auth');
Route::post('diary/create',[App\Http\Controllers\DiaryController::class, 'create'])->name('diary.create')->middleware('auth');
Route::get('diary/edit/{id}',[App\Http\Controllers\DiaryController::class, 'edit'])->name('diary.edit')->middleware('auth');
Route::post('/update/{id}', [App\Http\Controllers\DiaryController::class, 'update'])->name('diary.update')->middleware('auth');
Route::delete('/destroy/{id}', [App\Http\Controllers\DiaryController::class, 'destroy'])->name('diary.delete')->middleware('auth');


Route::get('category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index')->middleware('auth');
Route::post('category', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create')->middleware('auth');
Route::get('category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.ajax.index')->middleware('auth');
Route::get('ajax/category', [App\Http\Controllers\Ajax\CategoryController::class, 'index'])->name('category.ajax')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\DiaryController::class, 'index'])->name('home');