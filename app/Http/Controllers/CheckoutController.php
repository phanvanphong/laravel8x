<?php

namespace App\Http\Controllers;
use Auth;
use App\Helper\CartHelper;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use Mail;
use DB;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware('cus');
    }
   
    public function form(){
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();

        return view('site.checkout',compact('brand'));
    }

    public function submit_form(Request $request, CartHelper $cart){
        $customer_id = Auth::guard('cus')->user()->id;
        $customer_email = Auth::guard('cus')->user()->email;
        $customer_name = Auth::guard('cus')->user()->name;


        if( $order = Order::create([
            'customer_id' => $customer_id,
            'order_notes' => $request->order_notes,
            'order_delivery_address' => $request->order_delivery_address,
        ])){
            $order_id = $order->id;
            foreach ($cart->items as $key => $value) {
                $product_id = $value['id'];
                $order_number = $value['product_quantity'];
                $order_price = $value['product_price'];
                OrderDetails::create([
                    'order_id' => $order_id,
                    'order_number' => $order_number,
                    'order_price' => $order_price,
                    'product_id' => $product_id,
                ]);

                $product = DB::table('product')->where('id',$value['id'])->get();
                foreach($product as $key => $value){

                    $product_number = $value->product_number - $order_number;
                    $data = array();
                    $data['product_name'] = $value->product_name;
                    $data['product_cate'] = $value->product_cate;
                    $data['product_brand'] = $value->product_brand;
                    $data['product_number'] = $product_number;
                    $data['product_desc'] = $value->product_desc;
                    $data['product_price_original'] = $value->product_price_original;
                    $data['product_price'] = $value->product_price;
                    $data['product_image'] = $value->product_image;
                    $data['product_image_list'] = $value->product_image_list;
                    $data['product_status'] = $value->product_status;

            
                    $result = DB::table('product')->where('id',$value->id)->update($data);
                }

            }
            

            Mail::send('email.order',[
                'customer_name' => $customer_name,
                'order' => $order,
                'items' => $cart->items,
            ],function($mail) use($customer_email,$customer_name){
                $mail->to($customer_email,$customer_name);
                $mail->from('phanvanphongk49c@gmail.com');
                $mail->subject('Đơn hàng bạn đặt');
            }) ;

            session(['cart' => ""]);
            return redirect()->route('home.index');


        }
       
    }
}
