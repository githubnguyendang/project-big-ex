@extends('back-end.master')
@section('title')
    Danh sách đơn hàng
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Danh sách đơn hàng</h2>
        <div class="col-sm-12 mb-2">
            <form action="{{route('Order.index')}}" method="get">
                <div class="d-flex">
                    <input class="form-control" id="search" name="search" type="text" placeholder="Tìm kiếm theo: Mã đơn hàng, Tên khách hàng hoặc Số điện thoại">
                    <button type="submit" class="btn btn-danger"><svg style="fill: #ffff;"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="20" height="20"><path d="M37.613,36.293l-9.408-9.432a15.005,15.005,0,1,0-1.41,1.414L36.2,37.707A1,1,0,1,0,37.613,36.293ZM3.992,17A12.967,12.967,0,1,1,16.959,30,13,13,0,0,1,3.992,17Z"></path></svg></i></button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="text-center">
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Quê quán</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Ngày lên đơn</th>
                    <th scope="col">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $val)
                    <tr class="text-center">
                        <th scope="row">#{{$val->order_id}}
                            @if($val->status == 1)
                            <img style="width: 40px" src="acess/new.png" alt="">
                            @endif
                        </th>
                        <td>{{$val->name}}</td>
                        <td>{{$val->phone}}</td>
                        <td>{{$val->address}}-{{$val->xa}}-{{$val->huyen}}-{{$val->tinh}}</td>
                        <td>{{$val->status == 1 ? "Chưa xử lý" : "Đã xử lý"}}</td>
                        <td>{{$val->created_at}}</td>
                        <td>
                            <a class="btn btn-info"  href="admin/order-detail/{{$val->order_id}}">Xử lý</a><a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết ?');" href="admin/destroyOrder/{{$val->order_id}}">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div aria-label="Page navigation">
            {{$order->links()}}
        </div>
    </div>
    @if (session('message'))
        <script>
            $(document).ready(function(){
                swal("Thành công!", "{{session('message')}}", "success");
            });
        </script>
    @endif
@endsection
