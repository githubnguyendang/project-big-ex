@extends('back-end.master')
@section('title')
    Dashboard
@endsection
@section('main')
    <h2 class="text-center p-5 text-danger p-3 font-weight-bold">Trang tổng quan</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Thống kê đơn hàng</span>
                        <span class="info-box-number">{{count($order)}}</span>
                        <a href="{{route('Order.index')}}" class="small-box-footer">
                            Nhiều hơn&nbsp;
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thống kê sản phẩm</span>
                        <span class="info-box-number">{{count($pro)}}</span>
                        <a href="{{route('product.index')}}" class="small-box-footer">
                            Nhiều hơn&nbsp;
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fas fa-blog"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thống kê bài viết</span>
                        <span class="info-box-number">{{count($post)}}</span>
                        <a href="{{route('Post.index')}}" class="small-box-footer">
                            Nhiều hơn&nbsp;
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="far fa-images"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thống kê slider</span>
                        <span class="info-box-number">{{count($slider)}}</span>
                        <a href="{{route('Slider.index')}}" class="small-box-footer">
                            Nhiều hơn&nbsp;
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr><h4 class="p-3">Đơn hàng mới</h4></tr>
                            <tr class="text-center">
                                <th scope="col">ID </th>
                                <th scope="col">Email</th>
                                <th scope="col">Ngày lên đơn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($new_order as $val)
                                <tr class="text-center">
                                    <th scope="row">#{{$val->order_id}}
                                        @if($val->status == 1)
                                            <img style="width: 40px" src="acess/new.png" alt="">
                                        @endif
                                    </th>
                                    <td>{{$val->email}}</td>
                                    <td>{{$val->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr><h4 class="p-3">Top 5 Keyword được tìm kiếm nhiều nhất trên website</h4></tr>
                            <tr class="text-center">
                                <th scope="col">STT</th>
                                <th scope="col">Keyword</th>
                                <th scope="col">Lượt tìm kiếm</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt=1; ?>
                            @foreach($key_word as $val)
                                <tr class="text-center">
                                    <th scope="row">{{$stt++}}</th>
                                    <td>{{$val->key_name}}</td>
                                    <td>{{$val->views}}</td>
                                </tr>
                            @endforeach
                            <th class="text-center" colspan="3">
                                <a href="{{route('Keyword.index')}}">
                                    Xem tất cả &nbsp;
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </th>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr><h4 class="p-3">Top 5 bài viết nổi bật</h4></tr>
                            <tr class="text-center">
                                <th scope="col">STT</th>
                                <th scope="col">Tên bài viết</th>
                                <th scope="col">Lượt xem</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt=1; ?>
                            @foreach($post_views as $val)
                                <tr class="text-center">
                                    <th scope="row">{{$stt++}}</th>
                                    <td style="width: 75%">{{$val->title}}</td>
                                    <td>{{$val->views}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr><h4 class="p-3">Top 5 Sản phẩm nổi bật</h4></tr>
                            <tr class="text-center">
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Lượt xem</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt=1; ?>
                            @foreach($pro_views as $val)
                                <tr class="text-center">
                                    <th scope="row">{{$stt++}}</th>
                                    <td style="width: 75%">{{$val->pro_name}}</td>
                                    <td>{{$val->views}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('error'))
        <script>
            $(document).ready(function(){
                swal("Lỗi phân quyền!", "{{session('error')}}", "error");
            });
        </script>
    @endif
@endsection
