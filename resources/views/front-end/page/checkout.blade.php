@extends('front-end.master')
@section('title')
    Thanh toán
@endsection
@section('main')
    <h2 class="text-center font-weight-bold p-4">Thanh toán</h2>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 border-right">
                @foreach($cart->items as $item)
                    <div class="row">
                        <img class="col-sm-3" src="acess/upload/product/{{$item['thumbnail']}}" alt="">
                        <div class="col-sm-9">
                            <h5 class="font-weight-bold text-danger">{{$item['name']}}</h5>
                            <p class="font-weight-bold">{{number_format($item['price'])}}₫</p>
                            <p>Số lượng: {{$item['quantity']}}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
                    <div class="d-flex">
                        <h4 class="text-danger">Tổng giá trị đơn hàng:</h4> &nbsp;
                        <h4 class="text-danger">{{number_format($cart->total_price)}}₫</h4>
                    </div>
            </div>
            <div class="col-sm-7">
                <form action="{{route('Checkout.order')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="phone" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="tinh">Tỉnh/Thành phố:</label>
                            <input type="text" class="form-control" id="tinh" name="tinh" placeholder="Tỉnh/Thành phố">
                        </div>
                        <div class="col">
                            <label for="huyen">Quận/Huyện:</label>
                            <input type="text" class="form-control" id="huyen" name="huyen" placeholder="Quận/Huyện:">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="xa">Xã:</label>
                        <input type="xa" class="form-control" id="xa" name="xa" placeholder="Xã, thị trấn,...">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ cụ thể:</label>
                        <input type="address" class="form-control" id="address" name="address" placeholder="Đường, thôn, xã,...">
                    </div>
                    <div class="border p-3">
                        <p>Chọn phương thức thanh toán</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay" id="pay1" value="1" checked>
                            <label class="form-check-label" for="pay1">
                                Chuyển khoản
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay" id="pay" value="2">
                            <label class="form-check-label" for="pay">
                                Thanh toán khi nhận hàng
                            </label>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <label for="note">Ghi chú</label>
                        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="status" value="1">
                    <input type="submit" class="btn btn-danger w-100" value="Thanh toán">
                </form>
            </div>
        </div>
    </div>
@endsection
