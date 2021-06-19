<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OderDetail;

class CheckoutController extends Controller
{
    public function order(Request $request,CartHelper $cart){
        if ($order = Order::create([
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'tinh'=> $request->tinh,
            'huyen'=> $request->huyen,
            'xa'=> $request->xa,
            'address'=> $request->address,
            'note'=> $request->note,
            'status' => $request->status,
            'pay'=> $request->pay,
        ])) {
            $order_detail = $order->order_id;
            foreach ($cart->items as $item){
                $quantity = $item['quantity'];
                $price = $item['price'];
                $product_id = $item['id'];
                OderDetail::create([
                    'product_id'=>$product_id,
                    'price'=>$price,
                    'quantity'=>$quantity,
                    'order_detail'=>$order_detail,
                ]);
                $pro = Product::where('pro_id',$product_id)->first();
                $pro->pro_done = $pro->pro_done+$quantity;
                $pro->save();
            }
            session(['cart'=>'']);
            return redirect()->route('home')->with('message','Cảm ơn bạn đã đặt hàng !');
        }
        else {
            return back()->with('message','Đặt hàng không thành công');
        }
    }
    public function checkout(){
        return view('front-end.page.checkout');
    }
}

