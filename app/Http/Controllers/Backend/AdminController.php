<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Key_word;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Slider;
use App\Models\Post;
use Auth;

class AdminController extends Controller
{
    public function index(){
        return view('back-end.login');
    }
    public function login(){
        return view('back-end.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'user_name' => 'required',
            'password' => 'required',
        ],[
            'user_name.required' => 'User_name không được để trống !',
            'password.required' => 'Password không được để trống !'
        ]);
        $arr = [
            'user_name' => $request->user_name,
            'password' => $request->password,
        ];
        if (Auth::attempt($arr,$request->has('remember'))) {
            return redirect()->route('admin');
        }else{
            return redirect()->back()->with('message','Tài khoản hoặc mật khẩu sai !');
        }
    }
    public function admin(){
        $cate = Category::get();
        $pro = Product::get();
        $pro_views = Product::orderBy('views','DESC')->limit(5)->get();
        $order = Order::get();
        $new_order = Order::where('status',1)->get();
        $slider = Slider::get();
        $post = Post::get();
        $post_views = Post::orderBy('views','DESC')->limit(5)->get();
        $key_word = Key_word::orderBy('views','DESC')->limit(5)->get();
        return view('back-end.page.dashboard',compact('cate','pro','order','new_order','slider','post','pro_views','post_views','key_word'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
