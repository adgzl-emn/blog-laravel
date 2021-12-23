<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Articles::orderBy('created_at','DESC')->get();
        return view('back/articles/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('back/articles/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg'
        ]);

       // dd($request->post());
      $article=new Articles;
      $article->title=$request->title;
      $article->category_id= $request->category;
      $article->content=$request->editor;
      $article->slug=Str::slug($request->title);
      if ($request->hasFile('image')){
          $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('uploads'),$imageName);
          $article->image='/uploads/'.$imageName;
      }
      $article->save();
      toastr()->success('Başarıyla Oluşturuldu','Tebrikler!');

        return redirect()->route('yazilar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Articles::findOrFail($id);
        $categories = Category::all();
        return view('back/articles/update',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg'
        ]);

        // dd($request->post());
        $article=Articles::findOrFail($id);
        $article->title=$request->title;
        $article->category_id= $request->category;
        $article->content=$request->editor;
        $article->slug=Str::slug($request->title);
        if ($request->hasFile('image')){
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='/uploads/'.$imageName;
        }
        $article->save();
        toastr()->success('Başarıyla Güncellendi','Tebrikler!');

        return redirect()->route('yazilar.index');
    }
    public function switch(Request $request)
    {
      $article=Articles::findOrFail($request->id);
      $article->status=$request->statu=='true' ? 1 : 0;
      $article->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        Articles::findOrFail($id)->delete();
        toastr()->error('Yazı Silindi Silinen Yazılarda Saklandı','İşlem Tamam');
        return redirect()->route('yazilar.index');
    }

    public function trashed(){
        $articles = Articles::onlyTrashed()->orderBy('deleted_at','DESC')->get();
        return view('back/articles/trashed',compact('articles'));
    }
    public function recover($id){
        Articles::onlyTrashed()->findOrFail($id)->restore();
        toastr()->success('Yazı geri dönüştürüldü');
        return redirect()->route('yazilar.index');
    }

    public function forceDelete($id){
        $article = Articles::onlyTrashed()->findOrFail($id);
        if (File::exists($article->image)){
            File::delete(public_path($article->image));
        }
        $article->forceDelete();
        toastr()->error('Yazı Tamamen Kaldırıldı');
        return redirect()->route('silinen');
    }

    public function destroy($id)
    {
        //
    }
}
