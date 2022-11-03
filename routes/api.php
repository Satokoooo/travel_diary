<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', function(){
    return App\Models\Category::all();
});
Route::delete('categories/{id}',function($id){
    $category = App\Models\Category::find($id);
    $category->delete();
    return response()->json([
        'success' => 'category deleted successfully!']);
});
