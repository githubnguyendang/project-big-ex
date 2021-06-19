@extends('front-end.master')
@section('title')
    {{$pro->pro_name}}
@endsection
@section('main')
    <div class="container pro-detail">
        <div class="card">
            <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-5">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1">
                                    <img class="w-100" src="acess/upload/product/{{$pro->pro_thumbnail}}" alt="">
                                </div>
                                @foreach($pro->Image as $value)
                                <div class="tab-pane" id="pic-{{$value->image_id}}">
                                    <img src="acess/upload/product/libiry/{{$value->image}}" alt="Học thiết kế web bán hàng Online">
                                </div>
                                @endforeach
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="acess/upload/product/{{$pro->pro_thumbnail}}" alt="Học thiết kế web bán hàng Online"></a>
                                </li>
                                @foreach($pro->Image as $value)
                                <li><a data-target="#pic-{{$value->image_id}}" data-toggle="tab"><img src="acess/upload/product/libiry/{{$value->image}}" alt="Học thiết kế web bán hàng Online"></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="details col-md-7">
                            <h4 class="product-title">{{$pro->pro_name}}</h4>
                            @if($pro->pro_sale)
                                <h4 class="price text-danger">Giá bán: {{number_format($pro->pro_sale)}}₫ <del class="text-dark">{{number_format($pro->pro_price)}}₫</del> </h4>
                            @else
                                <h4 class="price text-danger">Giá bán: {{number_format($pro->pro_price)}}₫</h4>
                            @endif
                            <div class="sale border p-2">
                                <p><?= $pro->pro_sdescription ?></p>
                            </div>
                            <a href="cart/add/{{$pro->pro_id}}" class="btn btn-danger buy-item add_cart mt-2"> Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="description mt-4 border-top bg-white shadow-lg">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-dark " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><h4>Mô tả</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><h4>Đánh giá sản phẩm</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><h4>Sản phẩm liên quan</h4></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-5 " id="home" role="tabpanel" aria-labelledby="home-tab">{!! $pro->pro_description !!}</div>
                <div class="tab-pane fade pt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div id="fb-root"></div>
                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#{{$pro->pro_name}}" data-lazy="false" data-width="" data-numposts="5"></div>
                </div>
                <div class="tab-pane fade p-5" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        @foreach($sp_lienquan as $val)
                            <div class="col-sm-3 shadow p-2">
                                <a href="product/{{$val->pro_slug}}.html">
                                    <img class="w-100" src="acess/upload/product/{{$val->pro_thumbnail}}" alt="">
                                </a>
                                <a class="text-dark font-weight-bold" href="product/{{$val->pro_slug}}.html"><p>{{$val->pro_name}}</p></a>
                                <div class="pro-price d-flex">
                                    <p class="mr-3 text-danger">{{number_format($val->pro_price)}}</p>
                                    @if(isset($val->pro_sale))
                                        <del>{{number_format($val->pro_sale)}}</del>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
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
