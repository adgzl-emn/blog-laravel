<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    use SoftDeletes;

    public function getCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }                                  //category tablosundakı   //id     //category_id ile one to one ılıskı

    use HasFactory;
}
