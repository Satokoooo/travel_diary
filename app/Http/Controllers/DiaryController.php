<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Diary;
use \App\Models\Category;
use Auth;


class DiaryController extends Controller
{
    //新規追加画面
    public function add()
    {
        $categories = Category::get();
        return view('diary.create', ['categories' => $categories]);
    }
    
     //新規追加画面
    public function create(Request $request)
    {
      // Validationを行う
    //   dd($request);
    // dd($request);
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
       
       $categories = Category::get();
      
      //データベースに保存する
       $diary->fill($form);
       $diary->user_id=Auth::id();
       $diary->save();
      
      // diary/createにリダイレクトする
      return redirect('diary');
    }
    
    //一覧画面
    public function index(Request $request)
    {
        // $cond_title = $request->cond_title;
        // if($cond_title !=''){
        //     //検索された検索結果を取得する
        //     $posts = Diary::where('title', $cond_title)->sortable()->get();
        // }else{
        //     //それ以外は全て取得
        //     $posts = Diary::sortable()->get();
        // }
        
        
        $cond_title = $request->input('cond_title');
        $category = $request->input('category');
        $departure_date = $request->input('departure_date');
        
        $query = Diary::query();
        $query->join('categories',function($query) use ($request){
            $query->on('diaries.category_id', '=', 'categories.id');
        });
        
        if(!empty($cond_title)) {
            $query->where('title', 'LIKE', "%{$cond_title}%");
        }
        if(!empty($category)) {
            $query->where('category_id', '=', $category);
        }
        if(!empty($departure_date)) {
            $query->where('departure_date', '=', $departure_date);
        }
        // dd($query);
        $posts = $query->sortable()->get();
        $categories = Category::all();
        
        
        return view('diary.index', compact('posts', 'cond_title', 'category', 'departure_date'),['categories' => $categories]);
        
    }
    
    // 詳細画面
    public function show($id) {
        $diary = Diary::find($id);
        
        return view('diary.show', compact('diary'));
    }
    
    //編集画面
    public function edit($id)
    {
        //Modelからデータを取得する
        $diary = Diary::find($id);
        if (empty($diary)){
            abort(404);
        }
        
        $categories = Category::get();
        return view('diary.edit', compact('diary'), ['categories' => $categories]);
    }
    
    public function update(Request $request, $id)
    {
        //Validationをかける
        $this->validate($request, Diary::$rules);
        //Modelからでーたを取得する
        $diary = Diary::find($id);
        //送信されてきたフォームデータを格納する
        $diary_form = $request->all();
        if ($request->remove == 'true'){
            $diary_form['image_path'] = null;
        } elseif ($request->file('image')){
            $path = $request->file('image')->store('public/image');
            $diary_form['image_path'] = basename($path);
        } else {
            $diary_form['image_path'] = $diary->image_path;
        }
        
        unset($diary_form['image']);
        unset($diary_form['remove']);
        unset($diary_form['_token']);
        
        //該当するデータを上書きして保存する
        $diary->fill($diary_form)->save();
        
        return redirect()->route('diary.index');
    }
    
    //削除機能
    public function destroy($id)
    {
        $diary = Diary::find($id);
        $diary->delete();
        
        return redirect()->route('diary.index');
    }
    
}
