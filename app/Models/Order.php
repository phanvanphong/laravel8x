<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $table = "order";

    protected $fillable = ['order_date','order_notes','order_delivery_address','order_status','customer_id'];

    public function customer(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function cus(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function scopeSearch($query){
        if($key = request()->key){
            $query = Order::orderBy('id','DESC')->where('name','like','%'.$key.'%');
        }

        return $query;
    }

}
