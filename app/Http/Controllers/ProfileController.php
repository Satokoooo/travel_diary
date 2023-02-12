<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('profile.create');
    }
    
    public function create()
    {
        return redirect('profile/create');
    }
    
    public function edit()
    {
        return view('profile.edit');
    }
    
    public function update()
    {
        return redirect('profile/edit');
    }
}
