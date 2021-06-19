<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OderDetail;

class OrderController extends Controller
{
    public function index(Request $request){
        if ($request->search){
            $order = Order::where('order_id','like','%'.$request->search.'%')
                ->orWhere('name','like','%'.$request->search.'%')
                ->orWhere('phone','like','%'.$request->search.'%')
                ->simplePaginate(10);
            return view('back-end.page.order.index',compact('order'));
        }else{
            $order = Order::orderBy('order_id','DESC')->simplePaginate(10);
        }
        return view('back-end.page.order.index',compact('order'));
    }

    public function show($id){
        $order = Order::where('order_id',$id)->first();
        $order_detail = OderDetail::where('order_detail',$id)->join('products','order_detail.product_id','=','products.pro_id')->get();
        $total_price = 0;
        foreach ($order_detail as $val){
            $total_price += $val->price;
        }
        return view('back-end.page.order.order_detail',compact('order','order_detail','total_price'));
    }

    public function update(Request $request){
        $order = Order::where('order_id',$request->id)->first();
        $order->status = $request->status;
        $order->save();
        return redirect()->route('Order.index')->with('message','Xử lý thành công đơn hàng');
    }

    public function destroy($id){
        $order = Order::where('order_id',$id)->first();
        $order->delete();
        return back()->with('message','Xóa thành công đơn hàng');
    }
}
