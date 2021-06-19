@extends('back-end.master')
@section('title')
    Sửa Slider
@endsection
@section('main')
    <div class="container pt-2">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Sửa Slider</h2>
        @if (session('message'))
            <div class="alert alert-success text-center">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
        <form action="{{Route('Slider.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$slider->slider_id}}">
            <input type="hidden"  name="slider_old" value="{{$slider->image}}">
            <div class="form-group">
                <label for="name" class="font-weight-bold">Tên slider</label>
                <input type="text" class="form-control" id="name" value="{{$slider->name}}" name="name" required>
                @if($errors->has('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
            <p class="font-weight-bold">Slider cũ</p>
            <img  style="height: 200px" src="acess/upload/slider/{{$slider->image}}" alt="">
            <br>
            <br>
            <label class="font-weight-bold">Thay đổi Slider</label>
            <div class="custom-file w-25">
                <input type="file" class="form-control-file border" id="fileToUpload" name="fileToUpload">
            </div>
            @if($errors->has('fileToUpload'))
                <p class="text-danger">{{$errors->first('fileToUpload')}}</p>
            @endif
            <br> <br>
            <div class="form-group">
                <label for="status">Trạng thái sản phẩm</label>
                <select class="form-control" id="status" name="status">
                    <option {{$slider->status == 0 ? "selected = 'selected'" : ""}} value="0">Đăng</option>
                    <option {{$slider->status == 1 ? "selected = 'selected'" : ""}} value="1">Không đăng</option>
                </select>
            </div>
            <input class="btn btn-info d-block mx-auto" type="submit" value="Sửa Slider">
        </form>
    </div>

@endsection
