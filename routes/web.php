<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use \App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Backend\CodeSaleController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\KeywordController;
use App\Http\Controllers\Backend\RoleController;


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
Route::get('admin/login',[AdminController::class,'login'])->name('login');

Route::post('admin/login',[AdminController::class,'postLogin'])->name('Admin.postLogin');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('category/{slug}.html',[HomeController::class,'category'])->name('Home.category');

Route::get('product/{slug}.html',[HomeController::class,'product_detail'])->name('Home.product_detail');

Route::get('post/{slug}.html',[HomeController::class,'post_detail'])->name('Home.post_detail');

Route::get('search',[HomeController::class,'search'])->name('Home.search');


Route::prefix('admin')->middleware('auth')->group(function (){

    Route::get('logout',[AdminController::class,'logout'])->name('logout');

    Route::get('/',[AdminController::class,'index']);

    Route::get('dashboard',[AdminController::class,'admin'])->name('admin');

    Route::middleware('checkrole:producter')->group(function (){

    //    Category

        Route::get('category',[CategoryController::class,'index'])->name('cate.index');

        Route::post('category',[CategoryController::class,'store'])->name('cate.store');

        Route::get('destroyCate/{id}',[CategoryController::class,'destroy'])->name('destroyCate');

    //    Product

        Route::get('addProduct',[ProductController::class,'create'])->name('addProduct.create');

        Route::post('addProduct',[ProductController::class,'store'])->name('addProduct.store');

        Route::get('product',[ProductController::class,'index'])->name('product.index');

        Route::get('editProduct/{id}',[ProductController::class,'edit'])->name('editProduct.edit');

        Route::post('editProduct',[ProductController::class,'update'])->name('editProduct.update');

        Route::get('destroyProduct/{id}',[ProductController::class,'destroy'])->name('destroyProduct.destroy');

        Route::get('product/search',[ProductController::class,'search'])->name('Product.search');
    });

    Route::middleware('checkrole:user')->group(function (){
        //    User

        Route::get('user',[UserController::class,'index'])->name('user.index');

        Route::post('user',[UserController::class,'store'])->name('user.store');

        Route::get('destroyUser/{id}',[UserController::class,'destroy'])->name('User.destroy');

        Route::get('edit-user/{id}',[UserController::class,'show'])->name('User.show');

        Route::post('edit-user',[UserController::class,'update'])->name('User.update');

        Route::post('edit-pass/{id}',[UserController::class,'password'])->name('User.password');

        //  Roles
        Route::get('list-role',[RoleController::class,'index'])->name('Role.index');

        Route::post('add-role',[RoleController::class,'store'])->name('Role.store');

        Route::get('edit-role/{id}',[RoleController::class,'show'])->name('Role.show');

        Route::post('edit-role',[RoleController::class,'update'])->name('Role.update');

        Route::get('destroy-role/{id}',[RoleController::class,'destroy'])->name('Role.destroy');


    });

    Route::middleware('checkrole:slider')->group(function (){
    //    Slider


        Route::get('add-slider',[SliderController::class,'create'])->name('Slider.create');

        Route::post('add-slider',[SliderController::class,'store'])->name('Slider.store');

        Route::get('list-slider',[SliderController::class,'index'])->name('Slider.index');

        Route::get('edit-slider/{id}',[SliderController::class,'edit'])->name('Slider.edit');

        Route::post('edit-slider',[SliderController::class,'update'])->name('Slider.update');

        Route::get('destroy-slider/{id}',[SliderController::class,'destroy'])->name('Slider.destroy');

    });

    Route::middleware('checkrole:order')->group(function (){
    //    Order

        Route::get('order',[OrderController::class,'index'])->name('Order.index');

        Route::get('order-detail/{id}',[OrderController::class,'show'])->name('Order.show');

        Route::get('destroyOrder/{id}',[OrderController::class,'destroy'])->name('Order.destroy');

        Route::post('update-order',[OrderController::class,'update'])->name('Order.update');
    });

    Route::middleware('checkrole:post')->group(function (){
    //    Post

        Route::get('list-post',[PostController::class,'index'])->name('Post.index');

        Route::get('add-post',[PostController::class,'create'])->name('Post.create');

        Route::post('add-post',[PostController::class,'store'])->name('Post.store');

        Route::get('edit-post/{id}',[PostController::class,'edit'])->name('Post.edit');

        Route::post('update-post',[PostController::class,'update'])->name('Post.update');

        Route::get('destroy-post/{id}',[PostController::class,'destroy'])->name('Post.destroy');
    });

    Route::middleware('checkrole:keyword')->group(function (){
    //    Keyword

        Route::get('keyword',[KeywordController::class,'index'])->name('Keyword.index');
    });
});

Route::prefix('cart')->group(function(){

    Route::get('/',[CartController::class,'index'])->name('Cart.index');

    Route::get('add/{id}',[CartController::class,'add'])->name('Cart.add');

    Route::get('remove/{id}',[CartController::class,'remove'])->name('Cart.remove');

    Route::get('update/{id}',[CartController::class,'update'])->name('Cart.update');

    Route::get('clear',[CartController::class,'clear'])->name('Cart.clear');

});

Route::prefix('checkout')->group(function(){

    Route::get('/',[CheckoutController::class,'checkout'])->name('Checkout.checkout');

    Route::post('/',[CheckoutController::class,'order'])->name('Checkout.order');
});




