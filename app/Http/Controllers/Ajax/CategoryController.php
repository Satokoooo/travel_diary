<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index () {
        return Category::all();
    }
}
