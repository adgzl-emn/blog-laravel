<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Articles;

class CategoriesController extends Controller
{
   public function index(){
       $categories = Category::all();
       return view('back/categories/categorie',compact('categories'));
   }

   public function catupdate(Request $request){
       $isSlug=Category::whereSlug(Str::slug($request->slug))->whereNotIn('id',[$request->id])->first();
       $isName=Category::whereSlug($request->category)->whereNotIn('id',[$request->id])->first();

       if ($isSlug or $isName){
           toastr()->error('Bu İsimde kategori zaten mevcut','Başarısız!');
           return redirect()->back();
       }

       $category = Category::findOrFail($request->id);
       $category->name = $request->category;
       $category->slug= $request->Str::slug($request->slug);
       $category->save();
       toastr()->success('Başarı ile Güncellendi','Başarılı!');
       return redirect()->back();

   }

   public function getData(Request $request){
       $category = Category::findOrFail($request->id);
       return response()->json($category);
   }


   public function switch(Request $request){
       $category=Category::findOrFail($request->id);
       $category->status= $request->statu=='true' ? 1 : 0;
       $category->save();
   }

   public function categoryCreate(Request $request){
       $isExist = Category::whereSlug(Str::slug($request->title))->first();
       if ($isExist){
           toastr()->error('Bu İsimde kategori zaten mevcut','Başarısız!');
           return redirect()->back();
       }

      $category = new Category;
      $category->name=$request->title;
      $category->slug=Str::slug($request->title);
      $category->save();
      toastSuccess('Kategori Başarı ile oluşturuldu',);
      return redirect()->route('categories');
       // $category= Category::findOrFail($request->title);
   }
   public function categoryDelete(Request $request){
       $category= Category::findOrFail($request->id);
       if ($category->id==1){
           toastr()->error('Bu kategori silinemez','Başarısız!');
           return redirect()->back();
       }
       $count = $category->articleCount();
       if ($count>0){
           Articles::where('category_id',$category->id)->update(['category_id'=>1]);
           $defaultCategory = Category::find(1);

       }
       $category->delete();
       toastr()->success('Bu kategoriye ait '.$count.'yazılar'.$defaultCategory->name.'aktarıldı','Kategori başarı ile silindi');
       return redirect()->back();
   }

}
