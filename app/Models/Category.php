<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = "category";

    protected $fillable = ['category_name','category_status','category_desc'];

    // JOIN 1-N hasMany
    // JOIN 1-1 hasOne
    public function products(){
        return $this->hasMany(Product::class,'product_cate','id');
    }

    public function scopeSearch($query){
        if($key = request()->key){
            $query = Category::orderBy('id','DESC')->where('category_name','like','%'.$key.'%');
        }

        return $query;
    }
}
