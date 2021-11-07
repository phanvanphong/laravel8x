<?php

namespace App\Http\Controllers;

use App\Models\Orderdetails;
use Illuminate\Http\Request;
use DB;
use Auth;

class OrderdetailsController extends Controller
{
    
    public function orderdetails($id){
        $order_details = DB::table('order_details')
        ->join('product','product.id','=','order_details.product_id')
        ->where('order_id',$id)->get();

        return view('admin.orderdetails.index')->with('order_details',$order_details);
    }
}
