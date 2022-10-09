<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Diary;
use Auth;


class DiaryController extends Controller
{
    //
    public function add()
    {
        return view('diary.create');
    }
    
    public function create(Request $request)
    {
      // Validationを行う
      $this->validate($request, Diary::$rules);
      
      $diary = new Diary;
      $form = $request->all();
      
      //フォームから画像が送信されてきたら保存して$diary->image_path に画像のパスを保存する
       if(isset($form['image'])) {
           $path = $request->file('image')->store('public/image');
           $diary->image_path = basename($path);
       }else {
             $diary->image_path = null;   
       }
      
      //フォームから送信されてきた_tokenを削除する
       unset($form['_token']);
      
      //フォームから送信されてきたimageを削除する
       unset($form['image']);
      
      //データベースに保存する
       $diary->fill($form);
       $diary->user_id=Auth::id();
       $diary->save();
      
      // diary/createにリダイレクトする
      return redirect('diary/create');
    }  
    
    public function edit()
    {
        return view('diary.edit');
    }
    
    public function update()
    {
        return redirect('diary/edit');
    }
}
