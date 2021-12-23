<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Articles;

class Homepage extends Controller
{

    public function index(){
        $data['articles'] = Articles::with('getCategory')->where('status',1)
            ->whereHas('getCategory',function ($query){
              $query->where('status',1);
            })->orderBy('created_at','DESC')->get();
        $data['categories'] = Category::where('status',1)->inRandomOrder()->get();
        return view('front/homepage',$data);
    }

    public function yazilar(){
        $data['categories'] = Category::where('status',1)->inRandomOrder()->get();
        $data['articles'] = Articles::where('status',1)->orderBy('created_at','DESC')->get();
        $data['articles_say'] = Articles::orderBy('created_at','DESC')->get()->count();
        return view('front/yazilar',$data,$data,$data);
    }

    public function detail($slug){
        $article = Articles::whereSlug($slug)->first() ?? abort(403,'Böyle bir yazı bulunamadı');
        $article->increment('hit');
        $categories = Category::where('status',1)->get();
        return view('front/blogdetail',compact('categories','article'));

    }

    public function category($slug){
        $data['categories'] = Category::where('status',1)->inRandomOrder()->get();
        $category = Category::whereSlug($slug)->first() ?? abort(403,'Böyle bir yazı bulunamadı');
        $data['category'] = $category;
        $data['articles'] = Articles::where('category_id',$category->id)->orderBy('created_at','DESC')->get();
        return view('front/category',$data);
    }

    public function hakkimda(){
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front/hakkimda',$data);
    }


}
