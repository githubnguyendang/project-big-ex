@extends('front-end.master')
@section('title')
    {{$post->title}}
@endsection
@section('main')
    <div class="container shadow-lg mt-3 mb-3 bg-white mt-5">
        <div class="row">
            <div class="content col-sm-8">
                <div>
                    <h2 class="font-weight-bold pt-3" style="color: #78b43d">{{$post->title}}</h2>
                    <p><i class="far fa-clock"></i> {{$post->updated_at}}</p>
                </div>
                <div class="content-blog">
                    <h5 class="font-weight-bold mt-3">{{$post->description}}</h5>
                    <p>{!!$post->content!!}</p>
                </div>
                <div>
                </div>
            </div>
            <div class="category-other col-sm-4">
                <div class="category-other-blog">
                    <h4 class="pt-3 font-weight-bold border-bottom border-danger">Sản phẩm</h4>
                    <div class="pt-3">
                        @foreach($pro as $value)
                            <div class="row mb-1">
                                <a class="col-sm-4" href="product/{{$value->pro_slug}}.html"><img class="w-100" src="acess/upload/product/{{$value->pro_thumbnail}}" alt=""></a>
                                <div class="col-sm-8 pt-4">
                                    <p><a class="text-dark" href="product/{{$value->pro_slug}}.html">{{$value->pro_name}}</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-other">
            <h5 class="title-blog-other font-weight-bold text-success border-bottom border-success">BÀI VIẾT CÙNG CHUYÊN MỤC</h5>
            <div class="row pt-4">
                @foreach($baiviet_lienquan as $value)
                    <div class="col-sm-4">
                        <a class="text-dark font-weight-bold text-center" href="post/{{$value->slug}}.html">
                            <div ><img class="w-100" src="acess/upload/post/{{$value->thumbnail}}" alt=""></div>
                            <h5 class="pt-2">{{$value->title}}</h5>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
