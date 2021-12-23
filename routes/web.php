<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoriesController;
use App\Http\Controllers\Back\ContactController;
use App\Http\Controllers\Front\Iletisim;



//Front
Route::get('/',[Homepage::class,'index'])->name('homepage');
Route::get('yazilar',[Homepage::class,'yazilar'])->name('yazilar');
Route::get('yazilar/{slug}',[Homepage::class,'detail'])->name('detail');
Route::get('kategori/{category}',[Homepage::class,'category'])->name('category');
Route::get('hakkımda/',[Homepage::class,'hakkimda'])->name('hakkimda');
Route::get('iletisim',[Iletisim::class,'index'])->name('iletisim');
Route::post('iletisim',[Iletisim::class,'create'])->name('iletisim.create');


//Back
Route::prefix('admin')->middleware('isLogin')->group(function () {
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'loginPost']);
});

Route::prefix('admin')->middleware('isAdmin')->group(function (){
    Route::get('panel',[Dashboard::class,'index'])->name('homepage');
    Route::get('silinen/yazilar',[ArticleController::class,'trashed'])->name('silinen');
    Route::resource('yazilar',ArticleController::class);
    Route::get('switch',[ArticleController::class,'switch'])->name('switch');
    Route::get('delete/{id}',[ArticleController::class,'delete'])->name('delete');
    Route::get('forcedelete/{id}',[ArticleController::class,'forceDelete'])->name('forcedelete');
    Route::get('recover/{id}',[ArticleController::class,'recover'])->name('recover');
     //categori route
    Route::get('kategoriler',[CategoriesController::class,'index'])->name('categories');
    Route::get('kategori/status',[CategoriesController::class,'switch'])->name('kategoriswitch');
    Route::post('Kategoriler/create',[CategoriesController::class,'categoryCreate'])->name('category.create');
    Route::post('kategori/sil',[CategoriesController::class,'categoryDelete'])->name('kategori.sil');
    Route::get('kategori/getData',[CategoriesController::class,'getData'])->name('category.getData');
    Route::post('kategori/güncelle',[CategoriesController::class,'catupdate'])->name('category.update');
    Route::get('iletişim',[ContactController::class,'index'])->name('iletişim');

    Route::get('cikis',[AuthController::class,'logout'])->name('cikis');


});



/**
Route::post('kategoriler'[CategoriesController::class],'categoriOlustur')->name('categoriolustur');

Route::prefix('admin')->middleware('isLogin')->group(function () {
Route::get('login',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'loginPost']);
});





Route::prefix('admin')->middleware('isAdmin')->group(function () {
Route::get('panel',[Dashboard::class,'index']);
Route::resource('bloglar',ArticleController::class);
Route::get('cikis',[AuthController::class,'logout']);
});

 */
