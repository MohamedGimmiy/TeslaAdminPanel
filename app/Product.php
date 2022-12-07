<?php

namespace App;
use Illuminate\Support\Facades\File;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];


    public static function booted(){
        static::deleted(function ($product){
            File::delete(public_path('products'). '/'. $product->image);
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
