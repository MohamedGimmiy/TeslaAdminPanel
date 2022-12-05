<?php

namespace App;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    //
    protected $guarded = [];


    public function products(){
        return $this->hasMany('products');
    }

    public static function booted(){
        static::deleted(function ($category){
            File::delete(public_path('categories'). '/'. $category->image);
        });
    }
}
