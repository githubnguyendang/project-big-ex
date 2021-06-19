@extends('front-end.master')
@section('title')
    Giỏ hàng của bạn
@endsection
@section('main')
    <h2 class="text-center font-weight-bold pt-5">Giỏ hàng của bạn</h2>
    <hr>
    <div class="container-fluid">
        <div class="row pl-5">
            <div class="col-sm-7">
                @foreach($cart->items as $item)
                <div class="row">
                    <img class="col-sm-3" src="acess/upload/product/{{$item['thumbnail']}}" alt="">
                    <div class="col-sm-9">
                        <h4 class="font-weight-bold text-danger">{{$item['name']}}</h4>
                        <p class="font-weight-bold">{{number_format($item['price'])}}₫</p>
                        <div class="form-group d-flex">
                            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Số lượng</label> &nbsp;
                            <div>
                                <form action="cart/update/{{$item['id']}}" class="d-flex" method="get">
                                    @csrf
                                    <input type="number" class="form-control form-control-sm" id="quantity" name="quantity" value="{{$item['quantity']}}">
                                    <input type="submit" class="btn-sm btn-success ml-1" value="Cập nhật">
                                </form>
                            </div>
                        </div>
                        <h4 class="text-left text-danger mb-3">Tổng :{{number_format($item['price']*$item['quantity'])}} ₫</h4>
                        <hr>
                        <a href="cart/remove/{{$item['id']}}" class="btn btn-info">Xóa sản phẩm</a>
                    </div>
                </div>
                <hr>
                @endforeach
                @if($cart->items != [])
                    <a href="cart/clear" class="btn btn-success d-block mx-auto">Xóa hết</a>
                    @else
                    <h5 class="text-center">Giỏ hàng của bạn trống !</h5>
                @endif
            </div>
            <div class="col-sm-5 border">
                <h4 class="font-weight-bold text-danger pt-3">Thông tin đơn hàng</h4>
                <hr>
                <div class="row">
                    <h4 class="col-sm-4">Tổng tiền:</h4>
                    <h4 class="text-right text-danger font-weight-bold">{{number_format($cart->total_price)}}₫</h4>
                </div>
                <hr>
                <div>
                    <p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                    <p>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                </div>
                <a href="{{route('Checkout.checkout')}}" class="btn btn-danger w-100 mb-2"> Thanh toán</a>
                <a href="{{route('home')}}" class="text-danger"><i class="fas fa-reply"></i> Tiếp tục mua hàng</a>
            </div>
        </div>
    </div>
    <hr>
@endsection
