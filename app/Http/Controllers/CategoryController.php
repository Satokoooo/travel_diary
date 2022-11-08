<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    //
    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, Category::$rules);
        
        $category = new Category;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        $category->fill($form);
        $category->user_id=Auth::id();
        $category->save();
        
        return redirect('category');
    }
    
    public function index(){
        
        $categories = Category::all();
        return view('category.create');
    }
    
    
}
