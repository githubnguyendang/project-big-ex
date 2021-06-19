@extends('back-end.master')
@section('title')
    Danh sách Slider
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Danh sách Slider</h2>
        @if (session('message'))
            <div class="alert alert-success text-center">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-center" scope="col">Tên Slider</th>
                <th class="text-center" scope="col" colspan="2">Ảnh</th>
                <th class="text-center" scope="col">Trạng thái</th>
                <th class="text-center" scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php $stt=1;?>
            @foreach($slider as $val)
                <tr>
                    <th class="text-center" scope="row">{{$stt++}}</th>
                    <td class="text-center">{{$val->name}}</td>
                    <td class="text-center" colspan="2"><img style="width: 400px;height: 150px" src="acess/upload/slider/{{$val->image}}" alt=""></td>
                    <td class="text-center">{{$val->status == 0 ? "Đăng" : "Không đăng"}}</td>
                    <td class="text-center"><a class="btn btn-success  text-white" href="admin/edit-slider/{{$val->slider_id}}"><i class="fas fa-edit"></i></a> <a class="btn btn-danger text-white ml-1" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết ?');" href="admin/destroy-slider/{{$val->slider_id}}"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
