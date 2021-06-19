@extends('front-end.master')
@section('title')
    {{$cate->cate_name}}
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
                                <a class="pl-2 nav-link text-uppercase font-weight-bold" href="category/{{$val->cate_slug}}.html">{{$val->cate_name}} <i class="fa fa-chevron-down"></i></a>
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
                    <div class="d-flex">
                        <h2 class="font-weight-bold col-sm-9">{{$cate->cate_name}}</h2>
                        <div class="form-group col-sm-3" id="form_order">
                            <form method="get" id="form_order">
                                <label for="sel1">Sắp xếp theo:</label>
                                <select class="form-control order_by" name="order_by" id="order_by">
                                    <option {{Request::get('order_by') == "default" || !Request::get('order_by') ? "selected='selected'" : ""}} value="default" >Mặc định</option>
                                    <option {{Request::get('order_by') == "price_min" ? "selected='selected'" : ""}} value="price_min">Giá giảm dần</option>
                                    <option {{Request::get('order_by') == "price_max" ? "selected='selected'" : ""}} value="price_max">Giá tăng dần</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="pro-item container pt-5 shadow-lg p-3 bg-white rounded">
                        <div class="row">
                            @foreach($pro as $val)
                                <!-- product__item -->
                                <a href="product/{{$val->pro_slug}}.html" class="product__item nav-link text-dark px-2 col-sm-6">
                                    <div class="card p-1 col-sm-12">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 pr-1">
                                                <img src="acess/upload/product/{{$val->pro_thumbnail}}" class="card-img product_images" alt="{{$val->pro_name}}">
                                            </div>
                                            <div class="col-md-8 border-left">
                                                <div class="card-body py-1 px-2">
                                                    <h6 class="card-title product_title">{{$val->pro_name}}</h6>
                                                    <p class="card-subtitle mb-2 text-muted">{{$val->pro_author}}</p>
                                                        <div class="price d-flex mb-0">
                                                            @if($val->pro_sale)
                                                                <p class="mr-3 mb-0 text-danger">{{number_format($val->pro_sale)}}₫ <del class="text-dark">{{number_format($val->pro_price)}}₫</del></p>
                                                            @else
                                                                <p class="text-danger mb-0">{{number_format($val->pro_price)}}₫</p>
                                                            @endif
                                                        </div>
                                                    <hr class="mt-1">
                                                    <div class="text_lines fs-13"><?= $val->pro_sdescription ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($val->pro_sale == NULL) @else <div class="sale"><span>Sale</span></div>@endif
                                    </div>
                                </a>
                                <!-- end__product__item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
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
