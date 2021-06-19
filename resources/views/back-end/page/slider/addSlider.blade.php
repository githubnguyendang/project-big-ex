@extends('back-end.master')
@section('title')
    Thêm Slider mới
@endsection
@section('main')
    <div class="container pt-2">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Thêm Slider mới</h2>
        @if (session('message'))
            <div class="alert alert-success text-center">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
        <form action="{{Route('Slider.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="font-weight-bold">Tên slider</label>
                <input type="text" class="form-control" id="name" placeholder="Tên slider" name="name">
                @if($errors->has('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
            <label class="font-weight-bold">Ảnh</label>
            <div class="custom-file w-25">
                <input type="file" class="form-control-file border" id="fileToUpload" name="fileToUpload">
            </div>
            @if($errors->has('fileToUpload'))
                <p class="text-danger">{{$errors->first('fileToUpload')}}</p>
            @endif
            <div class="form-group">
                <label for="status">Trạng thái Slider</label>
                <select class="form-control" id="status" name="status">
                    <option value="0">Đăng</option>
                    <option value="1">Không đăng</option>
                </select>
            </div>
            <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm Slider">
        </form>
    </div>

@endsection
