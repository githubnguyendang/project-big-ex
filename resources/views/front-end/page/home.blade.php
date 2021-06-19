@extends('front-end.master')
@section('title')
    THEGIOISACH.VN
@endsection
@section('main')
    <div class="baner-top container-fluid pt-1">
        <div class="row mx-0 w-100">
            <div class="baner-top col-sm-4 d-block mx-auto">
               <a href="#" class="nav-link p-0">
                    <img src="acess/image/slider/slb1.png" class="w-100 h-100" alt="">
               </a>
            </div>
            <div class="baner-top col-sm-4 d-block mx-auto">
                <a href="#" class="nav-link p-0">
                    <img src="acess/image/slider/slb2.jpg" class="w-100 h-100" alt="">
                </a>
            </div>
            <div class="baner-top col-sm-4 d-block mx-auto">
                <a href="#" class="nav-link p-0">
                    <img src="acess/image/slider/slb3.jpg" class="w-100 h-100" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="clock">
        <div class="clock-title pb-0 pt-5">
            <div class="text-start global-group-title mb-3 text-white"><h2 class="group-title">Sách văn học</h2></div>
        </div>
        <div class="pro-item container pt-5 shadow-lg p-3 mb-5 bg-white rounded">
            <div class="row m-0">
                @foreach($pro_vanhoc as $val)
                    <!-- product__item -->
                    <a href="product/{{$val->pro_slug}}.html" class="product__item nav-link text-dark px-2 col-sm-4">
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
        <div class="other text-center pt-0 pb-4">
            <a href="category/van-hoc.html">Xem thêm</a>
        </div>
    </div>
    <div class="ads col-12 px-0 shadow-lg">
        <img src="acess/image/slider/sl1.jpg" class="w-100" alt="">
    </div>
    <div class="clock">
        <div class="clock-title pb-0 pt-5">
            <div class="text-start global-group-title mb-3 text-white"><h2 class="group-title">Sách kinh tế</h2></div>
        </div>
        <div class="pro-item container pt-5 shadow-lg p-3 mb-5 bg-white rounded">
            <div class="row m-0">
                @foreach($pro_kinhte as $val)
                    <!-- product__item -->
                    <a href="product/{{$val->pro_slug}}.html" class="product__item nav-link text-dark px-2 col-sm-4">
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
        <div class="other text-center pt-0 pb-4">
            <a href="category/kinh-te.html">Xem thêm</a>
        </div>
    </div>
    <div class="ads col-12 px-0 shadow-lg">
        <img src="acess/image/slider/sl1.jpg" class="w-100" alt="">
    </div>
    <div class="clock">
        <div class="clock-title pb-0 pt-5">
            <div class="text-start global-group-title mb-3 text-white"><h2 class="group-title">Sách mới</h2></div>
        </div>
        <div class="pro-item container pt-5 p-3 mb-5 shadow-lg bg-white rounded">
            <div class="row m-0">
                @foreach($new_product as $val)
                    <!-- product__item -->
                    <a href="product/{{$val->pro_slug}}.html" class="product__item nav-link text-dark px-2 col-sm-4">
                        <div class="card p-1 col-sm-12">
                            <div class="row no-gutters">
                                <div class="col-md-4 pr-1">
                                    <img src="acess/upload/product/{{$val->pro_thumbnail}}" class="card-img product_images" alt="{{$val->pro_name}}">
                                </div>
                                <div class="col-md-8 border-left">
                                    <div class="card-body py-1 px-2">
                                        <h6 class="m-0 card-title product_title single_text_lines">{{$val->pro_name}}</h6>
                                        <p class="m-0 card-subtitle mb-2 text-muted single_text_lines">{{$val->pro_author}}</p>
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
    <div class="clock">
        <div class="clock-title pb-0 pt-5">
            <div class="text-start global-group-title mb-3 text-white"><h2 class="group-title">Bảng xếp hạng SACHIEUHAY.VN</h2></div>
        </div>
        <div class="pro-item bang-xep-hang container pt-5 shadow-lg p-3 mb-5 bg-white row mx-0 rounded">
            <div class="col-sm-6">
                <div class="col-sm-12 border-end border-dark">
                    <?php $stt=1; ?>
                        @foreach($pro_views as $val)
                            <div class="text-center row align-items-center m-0">
                               <div class="text-success h3 col-2 fw-bold" id="stt">{{$stt++}}</div>
                                <div class="col-sm-10">
                                    <!-- product__item -->
                                    <a href="product/{{$val->pro_slug}}.html" class="product__item product__item__bxh nav-link text-dark px-2 col-sm-12" id="{{$val->pro_id}}">
                                        <div class="card border-0 p-1 col-sm-12">
                                            <div class="row no-gutters">
                                                <div class="col-md-2 pr-1">
                                                    <img src="acess/upload/product/{{$val->pro_thumbnail}}" class="card-img product_images" alt="{{$val->pro_name}}">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body text-start py-1 px-2">
                                                        <h6 class="card-title m-0 product_title">{{$val->pro_name}}</h6>
                                                        <p class="text-muted m-0">{{$val->pro_author}}</p>
                                                        <hr class="m-0">
                                                        <div class="text_lines fw-bold text-warning fs-14">{{$val->views}} điểm</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- end__product__item -->
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-12">
                @foreach($pro_views as $val)
                    <div class="py-4 px-2 pro__detail pro__detail{{$val->pro_id}}">
                        <div class="wrapper row">
                            <div class="preview col-md-5">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-1">
                                        <img class="w-100" src="acess/upload/product/{{$val->pro_thumbnail}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="details col-md-7">
                                <h4 class="product-title text_2_lines">{{$val->pro_name}}</h4>
                                @if($val->pro_sale)
                                    <h5 class="price text-danger">Giá bán: {{number_format($val->pro_sale)}}₫ <del class="text-dark">{{number_format($val->pro_price)}}₫</del> </h5>
                                @else
                                    <h5 class="price text-danger">Giá bán: {{number_format($val->pro_price)}}₫</h5>
                                @endif
                                <div class="pro__detail__sdescription border px-2">
                                    <p><?= $val->pro_sdescription ?></p>
                                </div>
                                <a href="cart/add/{{$val->pro_id}}" class="btn btn-danger buy-item add_cart mt-2"> Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="infomation container bg bg-white mt-5">
        <div class="row mx-0">
            <div class="col-sm-6 infomation-left">
                <div class="infomation-item pt-3">
                    <img class="w-100" src="acess/image/slider/slider-botom.webp" alt="">
                </div>
            </div>
            <div class="col-sm-6 infomation-right">
                <div class="infomation-text">
                    <h1 class="font-weight-bold text-center">VỀ CHÚNG TÔI</h1>
                    <p>EgoMall là sàn thương mại điện tử đầu tiên dành cho cộng đồng AOE I</p>
                    <p class="">Giá trị cốt lõi của EgoMall là mang đến cho cộng đồng những sản phẩm , dịch vụ tốt nhất cùng với ưu đãi lớn nhất . Mọi sản phẩm dịch vụ trên EgoMall phải đảm bảo mang lại giá trị thiết thực cho cộng đồng , là những thương hiệu
                        lớn đã được đội ngũ nhân viên công ty kiểm tra rất kỹ mới đưa đến anh em cộng đồng . Thương hiệu được bán trên EgoMall là những thương hiệu đã và đang quảng bá và đồng hành với cộng đồng AOE . Mua sắm trên EgoMall anh em sẽ
                        hài lòng với chất lượng sản phẩm cũng như các chương trình vô cùng hấp dẫn . Anh em sử dụng sản phẩm , dịch vụ trên EgoMall cũng đồng nghĩa với việc đóng góp 1 phần tài chính để cùng xây dựng cộng đồng AOE I với những giải
                        đấu hấp dẫn .
                    </p>
                    <p>Mọi chi tiết vui lòng liên hệ: 19009058</p>
                </div>
            </div>
        </div>
    </div> -->
    @if (session('message'))
        <script>
            $(document).ready(function(){
                swal("Đặt hàng thành công!", "{{session('message')}}", "success");
            });
        </script>
    @endif
    <script>
        $(document).ready(function(){
                
                $('.pro__detail').hide();
                var last_id = $('.product__item__bxh').eq(0).attr('id');
                $('.pro__detail'+last_id).show();
                $('.product__item').on('mouseenter',function(){
                    $('.pro__detail'+last_id).hide();
                    $('.pro__detail'+$(this).attr('id')).show();
                    last_id = $(this).attr('id');
                    
                })
                $('.product__item').on('mouseleave',function(){
                    $('.pro__detail'+$(this).attr('id')).hide();
                    $('.pro__detail'+last_id).show();
                })
            });
    </script>
@endsection
