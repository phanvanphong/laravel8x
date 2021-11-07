<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    
    protected $table = "order_details";

    protected $fillable = ['order_id','order_number','order_price','product_id'];

}
