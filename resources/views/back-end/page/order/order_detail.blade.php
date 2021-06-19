@extends('back-end.master')
@section('title')
    Xử lý đơn hàng
@endsection
@section('main')
    <h3 class="text-center text-danger pt-3 font-weight-bold">Chi tiết đơn hàng</h3>
    <hr>
    @if (session('message'))
        <div class="alert alert-success text-center">
            <strong>{{session('message')}}</strong>
        </div>
    @endif
    <div class="table-responsive">
        <h5 class="text-center pt-3 pb-1">Thông tin khách hàng</h5>
        <table class="table table-bordered">
            <thead class="border">
            <tr class="text-center border">
                <th scope="col">Mã đơn</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Quê quán</th>
                <th scope="col">Hình thức thanh toán</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Ngày lên đơn</th>
            </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>#{{$order->order_id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->address}}-{{$order->xa}}-{{$order->huyen}}-{{$order->tinh}}</td>
                    <td>
                        @if($order->pay == 1)
                            Chuyển khoản
                        @else
                            Thanh toán khi nhận hàng
                        @endif
                    </td>
                    <td>{{$order->note}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h5 class="text-center pt-3">Thông tin sản phẩm</h5>
    <table class="table table-bordered">
        <thead>
        <tr class="text-center">
            <th scope="col">STT</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt=1 ?>
        @foreach($order_detail as $val)
        <tr class="text-center">
            <th scope="row">{{$stt++}}</th>
            <td>{{$val->pro_name}}</td>
            <td>{{$val->price}}</td>
            <td>{{$val->quantity}}</td>
        </tr>
        @endforeach
        </tbody>
        <tr>
            <td class="text-right font-weight-bold" colspan="2">Tổng:</td>
            <td class="text-center">{{$total_price}}</td>
        </tr>
    </table>
    <div class="container pt-3">
        <form action="{{route('Order.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$order->order_id}}">
            <div class="form-group col-sm-4 mb-5">
                <label for="status">Tình trạng</label>
                <select class="form-control" id="status" name="status">
                    <option {{$order->status == 1 ? "selected = 'selected'" : ""}} value="1">Chưa xử lý</option>
                    <option {{$order->status == 0 ? "selected = 'selected'" : ""}} value="0">Đã xử lý</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success w-100" value="Xong">
        </form>
    </div>
@endsection
