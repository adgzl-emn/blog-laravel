<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Category;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $data['articleslenght'] = Articles::all()->count();
        $data['articlesonline'] = Articles::where('status',1)->get()->count();
        $data['categories'] = Category::all()->count();
        return view('back.dashboard',$data);
    }
}
