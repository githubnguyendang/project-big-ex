<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\product_category;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Key_word;

class HomeController extends Controller
{
    public function index(){
        $all_pro = Product::all();

        $new_product = Product::orderBy('pro_id','DESC')->where('status',0)->limit(6)->get();

        $cate_vanhoc = Category::where('cate_slug','van-hoc')->first()->pluck('cate_id');

        $pro_vanhoc = Product::whereIn('pro_cate', $cate_vanhoc)->limit(6)->get();

        $cate_kinhte = Category::where('cate_slug','kinh-te')->first()->pluck('cate_id');

        $pro_kinhte = Product::whereIn('pro_cate', $cate_kinhte)->limit(6)->get();

        $pro_views = Product::orderBy('views','DESC')->limit(5)->get();

        return view('front-end.page.home',compact('pro_vanhoc','pro_views','new_product','pro_kinhte'));

    }
    public function category(Request $request, $slug){
        $cate = Category::where('cate_slug',$slug)->first();
        if($cate->parent_id == 0){
            $pro = Category::where('parent_id',$cate->cate_id)
                            ->join('products','category.cate_id','=','products.pro_cate')
                            ->orWhere('cate_id',$cate->cate_id)
                            ->orderBy('pro_id','DESC')->get();
        }
        else{
            $pro = Product::where('pro_cate',$cate->cate_id)->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_id','DESC')->get();
        }
        if ($request->order_by){
            $order_by = $request->order_by;
            switch ($order_by){
                case 'price_min':
                    if($cate->parent_id == 0){
                        $pro = Category::where('parent_id',$cate->cate_id)->join('products','category.cate_id','=','products.pro_cate')->orderBy('pro_price','DESC')->get();
                    }
                    else{
                        $pro = Product::where('pro_cate',$cate->cate_id)->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_price','DESC')->get();
                    }
                    break;
                case 'price_max':
                    if($cate->parent_id == 0){
                        $pro = Category::where('parent_id',$cate->cate_id)->join('products','category.cate_id','=','products.pro_cate')->orderBy('pro_price','ASC')->get();
                    }
                    else{
                        $pro = Product::where('pro_cate',$cate->cate_id)->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_price','ASC')->get();
                    }
                    break;
                default:
                    if($cate->parent_id == 0){
                        $pro = Category::where('parent_id',$cate->cate_id)->join('products','category.cate_id','=','products.pro_cate')->orderBy('pro_id','DESC')->get();
                    }
                    else{
                        $pro = Product::where('pro_cate',$cate->cate_id)->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_id','DESC')->get();
                    }
            }
        }
        return view('front-end.page.product',compact('cate','pro'));
    }

    public function product_detail($slug){
        $pro = Product::where('pro_slug',$slug)->first();
        // dd($pro);
        $sp_lienquan = Product::where('pro_cate',$pro->pro_cate)->where('pro_slug','!=',$slug)->paginate(4);

        //Update view
        $pro->views = $pro->views+1;
        $pro->save();
        return view('front-end.page.product-detail',compact('pro','sp_lienquan'));
    }

    public function post_detail($slug){
        $post = Post::where('slug',$slug)->first();
        $baiviet_lienquan = Post::where('slug','!=','$slug')->limit(3)->get();
        $pro = Product::orderBy('pro_id','DESC')->limit(5)->get();

        //Update view
        $post->views = $post->views+1;
        $post->save();
        return view('front-end.page.post_detail',compact('post','baiviet_lienquan','pro'));
    }

    public function search(Request $request){
        $key_word = $request->search;
        $key = Key_word::where('key_name',$request->search)->first();
        if ($key){
            $key->views = $key->views+1;
            $key->save();
        }else{
            $key = new Key_word();
            $key->key_name = $key_word;
            $key->views = 1;
            $key->save();
        }
        $pro = Product::where('pro_name','like','%'.$request->search.'%')->get();
        return view('front-end.page.search',compact('pro','key_word'));
    }


}
