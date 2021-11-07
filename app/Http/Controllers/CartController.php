<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Product;
use App\Models\Brand;

class CartController extends Controller
{

    public function add(CartHelper $cart,$id){
        $product = Product::find($id);
        $cart->add($product);
        return redirect()->route('cart.show_cart');
    }

    public function remove(CartHelper $cart,$id){
        $cart->remove($id);
        return redirect()->back();
    }

    public function update(CartHelper $cart,$id){   
        $product_quantity = request()->product_quantity ? request()->product_quantity : 1;
        $cart->update($id,$product_quantity);
        return redirect()->back();
    }

    public function cart(CartHelper $cart){
        $cart->clear();
        return redirect()->back();
    }

    public function show_cart(){
        $brand = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();

        return view('site.show_cart',compact('brand'));
    }
}
