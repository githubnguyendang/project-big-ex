@extends('front-end.master')
@section('title')
    Kết quả tìm kiếm cho: {{$key_word}}
@endsection
@section('main')
    <div class="mt-5">
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="col-sm-3 pro-menu shadow-lg p-0">
                    <h4 class="font-weight-bold bg-success p-3 text-white">Danh mục sản phẩm</h4>
                    <ul class="navbar-nav p-3">
                        @foreach($category as $val)
                            <li class="nav-item dropdown border-bottom">
                                <a class="pl-2 nav-link dropbtn text-uppercase font-weight-bold" href="category/{{$val->cate_slug}}.html">{{$val->cate_name}} <i class="fa fa-chevron-down"></i></a>
                                <div class="dropdown-content w-100">
                                    @foreach($val->CatChils as $CatChills  )
                                        <a class="font-weight-bold" href="category/{{$CatChills->cate_slug}}.html">{{$CatChills->cate_name}}</a>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <h2 class="font-weight-bold text-center">Tìm kiếm : <i>{{$key_word}}</i></h2>
                    <p class="text-center">Có {{count($pro)}} sản phẩm cho tìm kiếm</p>
                    <div class="pro-item container pt-5 shadow-lg p-3 bg-white rounded">
                        <div class="row">
                            @foreach($pro as $val)
                                <div class="col-sm-3 shadow p-1 mb-4">
                                    <div class="pro-item-img">
                                        <a href="product/{{$val->pro_slug}}.html"><img class="w-100" src="acess/upload/product/{{$val->pro_thumbnail}}" alt=""></a>
                                        @if(isset($val->pro_sale))
                                            <span class="pro-sale">
                                                <small class="text-white font-weight-bold">{{floor((($val->pro_price)-($val->pro_sale))/(($val->pro_price))*100)}}%</small>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="pro-detail">
                                        <h3 class="pro-name text-center"><a href="product/{{$val->pro_slug}}.html">{{$val->pro_name}}</a></h3>
                                        <div class="pro-price d-flex ">
                                            <p class="mr-3 text-danger">{{number_format($val->pro_price)}}₫</p>
                                            @if(isset($val->pro_sale))
                                                <del>{{number_format($val->pro_sale)}}₫</del>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
