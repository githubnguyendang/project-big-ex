<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Product;

class CartController extends Controller
{
    public function index(){
        return view('front-end.page.cart');
    }

    public function add(CartHelper $cart,$id){
        $product = Product::find($id);
        $cart->add($product);
        return back()->with('message','Thêm sản phẩm thành công vào giỏ hàng !');
    }

    public function remove(CartHelper $cart,$id){
        $cart->remove($id);
        return back();
    }

    public function update(CartHelper $cart,$id,Request $request){
        if (isset($request->quantity)){
            $quantity = $request->quantity;
        }else{
            $quantity = 1;
        }
        $cart->update($id,$quantity);
        return back();
    }

    public function clear(CartHelper $cart){
        $cart->clear();
        return back();
    }
}
