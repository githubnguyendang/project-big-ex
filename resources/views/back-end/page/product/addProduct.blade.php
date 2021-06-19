@extends('back-end.master')
@section('title')
    Thêm sản phẩm mới
@endsection
@section('main')
    <div class="container pt-2">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Thêm sản phẩm mới</h2>
        @if (session('message'))
            <div class="alert alert-success text-center">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
        <form action="{{Route('addProduct.store')}}" method="POST" enctype="multipart/form-data" id="form-product">
            @csrf
            <div class="form-group">
                <label for="proName" class="font-weight-bold">Tên sản phẩm</label>
                <input type="text" class="form-control" id="proName" placeholder="Tên sản phẩm" name="proName" value="{{old('proName')}}">
                @if($errors->has('proName'))
                    <p class="text-danger">{{$errors->first('proName')}}</p>
                @endif
            </div>
            <div class="form-group mb-4">
                <label for="category" class="font-weight-bold">Danh mục</label>
                <select class="form-control" id="category" name="category">
                    <?php showCategories($cate) ?>
                </select>
            </div>
            <div class="row">
                <label class="font-weight-bold col-sm-4">Tác giả:</label>
                <div class="custom-file col-sm-12">
                    <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}">
                </div>
                @if($errors->has('author'))
                    <p class="text-danger">{{$errors->first('author')}}</p>
                @endif
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="font-weight-bold col-sm-4">Thumbnail sản phẩm:</label>
                        <div class="custom-file col-sm-6 px-0">
                            <input type="file" class="form-control-file border" id="fileToUpload" name="fileToUpload" value="{{old('fileToUpload')}}">
                        </div>
                        @if($errors->has('fileToUpload'))
                            <p class="text-danger">{{$errors->first('fileToUpload')}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="font-weight-bold col-sm-4">Thư viện ảnh:</label>
                        <div class="custom-file col-sm-6 px-0">
                            <input type="file" class="form-control-file border" id="fileToUploads" name="fileToUploads[]" value="{{old('fileToUploads[]')}}" multiple >
                        </div>
                        @if($errors->has('fileToUploads'))
                            <p class="text-danger">{{$errors->first('fileToUploads')}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="pro_price" class="col-sm-4 col-form-label">Giá sản phẩm :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="pro_price" name="pro_price" value="{{old('pro_price')}}">
                        </div>
                        @if($errors->has('pro_price'))
                            <p class="text-danger">{{$errors->first('pro_price')}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="pro_sale" class="col-sm-4 col-form-label">Giá khuyến mãi :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="pro_sale" name="pro_sale" value="{{old('pro_sale')}}">
                        </div>
                        @if($errors->has('pro_sale'))
                            <p class="text-danger">{{$errors->first('pro_sale')}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="description" class="font-weight-bold">Mô tả sản phẩm</label>
                <textarea class="form-control ckeditor" id="description" rows="3" name="description">{{old('description')}}</textarea>
                @if($errors->has('description'))
                    <p class="text-danger">{{$errors->first('description')}}</p>
                @endif
                <script>
                    var editor = CKEDITOR.replace('content',{
                        language: 'vi',
                        filebrowserImageBrowseUrl: 'acess/editor/ckfinder/ckfinder.html?Type=Image',
                        filebrowserFlashBrowseUrl: 'acess/editor/ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl: 'acess/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl: 'acess/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    });
                </script>
            </div>
            <div class="form-group">
                <label for="sdescription" class="font-weight-bold">Mô tả ngắn</label>
                <textarea class="form-control ckeditor" id="sdescription" rows="2" name="sdescription">{{old('sdescription')}}</textarea>
                @if($errors->has('sdescription'))
                    <p class="text-danger">{{$errors->first('sdescription')}}</p>
                @endif
                <script>
                    var editor = CKEDITOR.replace('content',{
                        language: 'vi',
                        filebrowserImageBrowseUrl: 'acess/editor/ckfinder/ckfinder.html?Type=Image',
                        filebrowserFlashBrowseUrl: 'acess/editor/ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl: 'acess/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl: 'acess/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    });
                </script>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái sản phẩm</label>
                <select class="form-control" id="status" name="status">
                    <option value="0">Đăng</option>
                    <option value="1">Không đăng</option>
                </select>
            </div>
            <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm sản phẩm">
        </form>
    </div>
    <?php
    function showCategories($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $val){
            if ($val->parent_id == $parent_id){
                echo '<option value="'.$val->cate_id.'">'.$char .$val->cate_name.'</option>';
                showCategories($categories,$val->cate_id,$char."--");
            }
        }
    }
    ?>
@endsection
