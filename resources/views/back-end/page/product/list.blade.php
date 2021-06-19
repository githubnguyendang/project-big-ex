@extends('back-end.master')
@section('title')
    Danh sách sản phẩm
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Danh sách sản phẩm</h2>
        @if (session('message'))
            <div class="alert alert-success text-center">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-8">
                <div class="col-sm-8 search">
                    <form action="{{route('product.index')}}" method="get">
                        <div class="d-flex">
                            <input class="form-control" id="search" name="search" type="text" placeholder="Tên sản phẩm...">
                            <button type="submit" class="btn btn-danger"><svg style="fill: #ffff;"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="20" height="20"><path d="M37.613,36.293l-9.408-9.432a15.005,15.005,0,1,0-1.41,1.414L36.2,37.707A1,1,0,1,0,37.613,36.293ZM3.992,17A12.967,12.967,0,1,1,16.959,30,13,13,0,0,1,3.992,17Z"></path></svg></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <form method="get" id="form_order" class=" pb-2 " action="{{route('product.index')}}">
                    <div class="form-group row">
                        <label class="col-sm-4" for="">Sắp xếp theo:</label>
                        <select class="form-control order_by col-sm-8" name="order_by" id="order_by">
                            <option {{Request::get('order_by') == "new" || !Request::get('order_by') ? "selected='selected'" : ""}} value="new" >Mới nhất</option>
                            <option {{Request::get('order_by') == "old" ? "selected='selected'" : ""}} value="old">Cũ nhất</option>
                            <option {{Request::get('order_by') == "price_max" ? "selected='selected'" : ""}} value="price_max">Giá tăng dần</option>
                            <option {{Request::get('order_by') == "price_min" ? "selected='selected'" : ""}} value="price_min">Giá giảm dần</option>
                            <option {{Request::get('order_by') == "view" ? "selected='selected'" : ""}} value="view">Theo View</option>
                            <option {{Request::get('order_by') == "order" ? "selected='selected'" : ""}} value="order">Theo số lượng đã bán</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="text-center">
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Giá gốc</th>
                    <th scope="col">Giá khuyến mãi</th>
                    <th scope="col">Đã bán</th>
                    <th scope="col">Views</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1 ?>
                @foreach($pro as $value)
                    <tr class="text-center">
                        <th scope="row">{{$stt++}}</th>
                        <td style="width: 25%">{{$value->pro_name}}</td>
                        <td>{{$value->cate_name}}</td>
                        <td>{{number_format($value->pro_price)}} vnđ</td>
                        <td>
                            @if(isset($value->pro_sale) && $value->pro_sale>0)
                                {{number_format($value->pro_sale)}} vnđ
                            @endif
                        </td>
                        <td>{{$value->pro_done}}</td>
                        <td>{{$value->views}}</td>
                        <td>
                            {{$value->status == 0 ? "Đăng" : "Không đăng"}}
                        </td>
                        <td>
                            <a class="btn btn-success  text-white"  href="admin/editProduct/{{$value->pro_id}}"><i class="fas fa-edit"></i></a><a class="btn btn-danger text-white ml-1" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết ?');" href="admin/destroyProduct/{{$value->pro_id}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div aria-label="Page navigation">
            {{$pro->links()}}
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#order_by').change(function(){
                $('form#form_order').submit();
            });
        });
    </script>
@endsection
