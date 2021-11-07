<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderdetailsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Home, About, ....
Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/about',[HomeController::class,'about'])->name('home.about');
Route::get('/blog',[HomeController::class,'blog'])->name('home.blog');
Route::get('/related_cate/{id}',[HomeController::class,'related_cate'])->name('related_cate');
Route::get('/related_brand/{id}',[HomeController::class,'related_brand'])->name('related_brand');
Route::get('/contact',[HomeController::class,'contact'])->name('home.contact');
Route::post('/contact',[HomeController::class,'post_contact'])->name('home.contact');

// Login, Logout Customer & details_product 
Route::get('/details_product/{id}/{product_cate}',[HomeController::class,'details_product'])->name('details_product');
Route::post('/details_product/{id}/{product_cate}',[HomeController::class,'post_details_product'])->name('details_product');
Route::get('/login',[HomeController::class,'login'])->name('home.login');
Route::post('/login',[HomeController::class,'post_login'])->name('home.login');
Route::get('/register',[HomeController::class,'register'])->name('home.register');
Route::post('/register',[HomeController::class,'post_register'])->name('home.register');
Route::get('/logout',[HomeController::class,'logout'])->name('home.logout');

// Login, Logout Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){
    Route::get('/',[AdminController::class,'index'])->name('dashboard');
    Route::get('/file',[AdminController::class,'file'])->name('file');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    Route::get('/orderdetails/{id}',[OrderdetailsController::class,'orderdetails'])->name('orderdetails');

    Route::resources([
        'category' => 'CategoryController',
        'brand' => 'BrandController',
        'product' => 'ProductController',
        'customer' => 'CustomerController',
        'order' => 'OrderController',
        'user' => 'UserController',
    ]);
});

// Order details


Route::get('admin/login',[AdminController::class,'login'])->name('login');
Route::post('admin/login',[AdminController::class,'post_login'])->name('login');

// Cart
Route::group(['prefix' => 'cart'],function(){
    Route::get('/show_cart',[CartController::class,'show_cart'])->name('cart.show_cart');
    Route::get('/add/{id}',[CartController::class,'add'])->name('cart.add');
    Route::get('/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
    Route::get('/update/{id}',[CartController::class,'update'])->name('cart.update');
    Route::get('/clear',[CartController::class,'clear'])->name('cart.clear');
});

// Checkout
Route::group(['prefix' => 'checkout'],function(){
    Route::get('/',[CheckoutController::class,'form'])->name('checkout')->middleware('cus');
    Route::post('/',[CheckoutController::class,'submit_form'])->name('checkout')->middleware('cus');
});

// My Order
Route::get('/myorder/{customer_id}',[HomeController::class,'myorder'])->name('myorder')->middleware('cus');
Route::get('/myorder_details/{id}',[HomeController::class,'myorder_details'])->name('myorder_details')->middleware('cus');



