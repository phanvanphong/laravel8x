<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Comment;
use DB;
use Auth;
use Mail;

class HomeController extends Controller
{
    public function index(){
        $product_new = Product::limit(6)->orderBy('id','DESC')->get();
        $category = Category::where('category_status',1)->orderBy('category_name','ASC')->get();
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();
        $product_trend_price = Product::limit(3)->orderBy('product_price','DESC')->get();
        $product_trend_price_original = Product::limit(3)->orderBy('product_price_original','ASC')->get();

        if(request()->price_from && request()->price_to){
            $product_new = Product::where('product_status',1)->whereBetween('product_price',[request()->price_from,request()->price_to])->orderBy('product_price','DESC')->limit(6)->get();
            $product_trend_price = Product::whereBetween('product_price',[request()->price_from,request()->price_to])->orderBy('product_price','DESC')->limit(3)->get();
            $product_trend_price_original = Product::whereBetween('product_price',[request()->price_from,request()->price_to])->orderBy('product_price_original','DESC')->limit(3)->get();
        }

        return view('site.home',compact('product_new','category','brand','product_trend_price','product_trend_price_original'));
    }

    public function about(){
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();
        return view('site.about',compact('brand'));
    }

    public function blog(){
        $category = Category::where('category_status',1)->orderBy('category_name','ASC')->get();
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();
        return view('site.blog',compact('brand','category'));
    }

    public function related_cate($id){
        $product_new = Product::where('product_cate',$id)->orderBy('id','DESC')->get();
        $category = Category::where('category_status',1)->orderBy('category_name','ASC')->get();
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();
      
        return view('site.related',compact('product_new','category','brand'));
    }

    public function related_brand($id){
        $product_new = Product::where('product_brand',$id)->orderBy('id','DESC')->get();
        $category = category::where('category_status',1)->orderBy('category_name','ASC')->get();
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();
      
        return view('site.related',compact('product_new','category','brand'));
    }

    public function details_product($id,$product_cate){

        $category = Category::where('category_status',1)->orderBy('category_name','ASC')->get();
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();
        $details_product = Product::where('id',$id)->get();
        $comment = Comment::where('product_id',$id)->get();

        $related_product = Product::where('product_cate',$product_cate)->orderBy('product_price','DESC')->get();

        return view('site.details_product',compact('details_product','category','brand','related_product','comment'));
    }

    public function register(){
        return view('site.site_register');
    }

    public function post_register(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:customer',
            'password' => 'required',
            'phone' => 'required',
        ],[
            'email.required' => "Vui lòng nhập địa chỉ email",
            'email.email' => "Vui lòng nhập đúng định dạng email",
            'email.unique' => "Email này đã tồn tại",
            'name.required' => "Vui lòng nhập địa chỉ tên khách hàng",
            'phone.required' => "Vui lòng nhập số điện thoại",
            'password.required' => "Vui lòng nhập mật khẩu",
        ]);

        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);
        if(Customer::create($request->all())){
            return redirect()->route('home.login'); 
        }

    }


    public function login(){
        return view('site.site_login');
    }

    public function post_login(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => "Vui lòng nhập địa chỉ email",
            'password.required' => "Vui lòng nhập mật khẩu",
        ]);

        if(Auth::guard('cus')->attempt($request->only('email','password'),$request->has('remember_token'))){
            return redirect()->route('home.index');
        }else{
            return redirect()->back(); 
        }
    }

    public function logout(){
        Auth::guard('cus')->logout();
        return redirect()->route('home.index');
    }



    public function contact(){
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();

        return view('site.contact',compact('brand'));
    }

    public function post_contact(Request $request){

        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();

        Mail::send('email.contact',[
            'name' => $request->name,
            'content' => $request->content,
        ],function($mail) use($request){
            $mail->to('phanvanphongk49c@gmail.com',$request->name);
            $mail->from($request->email);
            $mail->subject('Thư góp ý của khách hàng BIGSHOES');
        }) ;

        return view('site.contact',compact('brand'));
    }



    public function myorder($customer_id){
        
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();
        $order = Order::where('customer_id',$customer_id)->orderBy('id','DESC')->paginate(5);
        return view('site.myorder',compact('brand','order'));
    }


    public function myorder_details($id){
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();
        $myorder_details = DB::table('order_details')
        ->join('product','product.id','=','order_details.product_id')
        ->where('order_id',$id)->get();

        $myorder_id = $id;
        
        return view('site.myorder_details',compact('brand','myorder_details','myorder_id'));
    }


    public function post_details_product(Request $request,$id,$product_cate){

        if(Comment::create($request->all())){
            return redirect()->route('details_product',[$id,$product_cate]);         
        }

    }
}
