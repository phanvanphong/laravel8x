<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    protected $table = "brand";

    protected $fillable = ['brand_name','brand_status','brand_desc'];

    // JOIN 1-N hasMany
    // JOIN 1-1 hasOne
    public function products(){
        return $this->hasMany(Product::class,'product_brand','id');
    }

    public function scopeSearch($query){
        if($key = request()->key){
            $query = Brand::orderBy('id','DESC')->where('brand_name','like','%'.$key.'%');
        }

        return $query;
    }
}
