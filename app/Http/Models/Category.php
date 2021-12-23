<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Articles;



class Category extends Model
{
    public function articleCount(){
        return  $this->hasMany(Articles::class,'category_id','id')->count();
                                        //modelındekı     category id sutunundakıı  idlerı   count et
    }


    use HasFactory;
}
