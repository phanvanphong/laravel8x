<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "product";

    protected $fillable = ['product_cate','product_brand','product_name','product_number','product_size','product_desc','product_price_original',
    'product_price','product_image','product_image_list','product_status'
    ];

    public function cate(){
        return $this->hasOne(Category::class,'id','product_cate');
    }

    public function brand(){
        return $this->hasOne(Brand::class,'id','product_brand');
    }

    public function scopeSearch($query){
        if($key = request()->key){
            $query = Category::orderBy('id','DESC')->where('category_name','like','%'.$key.'%');
        }

        return $query;
    }

}
