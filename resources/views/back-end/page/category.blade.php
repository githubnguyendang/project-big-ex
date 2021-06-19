@extends('back-end.master')
@section('title')
    Quản lý danh mục sản phẩm
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Danh mục bài viết</h2>
        <div class="row">
            <div class="col-sm-8">
                <h4 class="text-center font-weight-bold">Danh sách danh mục</h4>
                @if (session('message1'))
                    <div class="alert alert-success text-center">
                        <strong>{{session('message1')}}</strong>
                    </div>
                @endif
                <table class="table list-cate">
                    <thead>
                    <tr>
                        <th style="text-align:center" scope="col">STT</th>
                        <th style="text-align:center" scope="col">Tên danh mục</th>
                        <th style="text-align:center" scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1 ?>
                    @foreach($cate as $value)
                        <tr>
                            <th style="text-align:center" scope="row">{{$stt++}}</th>
                            <td style="text-align:center">{{$value->cate_name}}</td>
                            <td style="text-align:center"><a class="btn btn-danger text-white"  onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục ?');" href="admin/destroyCate/{{$value->cate_id}}"><i class="fas fa-trash-alt"></i></a></td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                <div aria-label="Pagination Navigation" class="mb-4 text-info">
                    {{$cate->links()}}
                </div>
            </div>
            <div class="col-sm-4 border-left">
                <h4 class="text-center font-weight-bold">Thêm danh mục mới</h4>
                <form action="{{route('cate.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Catename">Tên danh mục</label>
                        <input type="text" class="form-control" id="Catename" placeholder="Tên danh mục" name="Catename">
                    </div>
                    @if($errors->has('Catename'))
                        <p class="text-danger">{{$errors->first('Catename')}}</p>
                    @endif
                    <div class="form-group mb-4">
                        <label for="parent_id" class="font-weight-bold">Danh mục cha</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option selected value="0">Không</option>
                            <?php showCategories($showcate) ?>
                        </select>
                    </div>
                    <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm">
                </form>
                @if(session('message'))
                <div class="alert text-center text-info">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
            </div>
        </div>

    </div>
    <?php

    function showCategories($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $val) {
            if ($val->parent_id == $parent_id) {
                echo '<option value="' . $val->cate_id . '">' . $char . $val->cate_name . '</option>';
                showCategories($categories, $val->cate_id, $char . "--");
            }
        }
    }

    ?>
@endsection
