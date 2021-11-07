<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;

use Auth;

class AdminController extends Controller
{
    public function index(){
        $product_items = Product::count();
        $product = Product::all();
        $product_count = 0;
        foreach ($product as $key => $value) {
           $product_count += $value['product_number'];
        }
        $order_count = Order::count();
        $customer_count = Customer::count();
        $order_new = Order::where('order_status',0)->orderBy('id','DESC')->get();
        if(request()->date_form && request()->date_to){
            $order_new = Order::where('order_status',0)->whereBetween('created_at',[request()->date_form,request()->date_to])->orderBy('id','DESC')->get();
        }

       
        return view('admin.dashboard',compact('product_items','order_count','customer_count','order_new','product_count'));
    }

    public function file(){
        return view('admin.file');
    }

    public function login(){
        return view('admin.admin_login');
    }

    public function post_login(Request $request){
        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
        ]);
        
        if(Auth::attempt($request->only('email','password'),$request->has('remember_token'))){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back();
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
