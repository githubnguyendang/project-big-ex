@extends('back-end.master')
@section('title')
    Sửa sản phẩm
@endsection
@section('main')
    <div class="container pt-2">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Sửa sản phẩm</h2>
        @if (session('message'))
            <div class="alert alert-success text-center">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
        <form action="{{Route('editProduct.update')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$pro->pro_id}}">
            <input type="hidden" name="thumbnail" value="{{$pro->pro_thumbnail}}">
            @csrf
            <div class="form-group">
                <label for="proName" class="font-weight-bold">Tên sản phẩm</label>
                <input type="text" class="form-control" id="proName" value="{{$pro->pro_name}}" name="proName">
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
            <div class="form-group">
                <label for="author" class="font-weight-bold">Tác giả</label>
                <input type="text" class="form-control" id="author" value="{{$pro->pro_author}}" name="author">
                @if($errors->has('author'))
                    <p class="text-danger">{{$errors->first('author')}}</p>
                @endif
            </div>
            <div class="border p-2">
                <div>
                    <label class="font-weight-bold">Thumbnail sản phẩm :</label>
                    <div class="custom-file w-25">
                        <input type="file" class="form-control-file border" id="fileToUpload" name="fileToUpload">
                    </div>
                </div>
                <br>
                <div>
                    <img style="width: 200px" src="acess/upload/product/{{$pro->pro_thumbnail}}" alt="">
                </div>
                @if($errors->has('fileToUpload'))
                    <p class="text-danger">{{$errors->first('fileToUpload')}}</p>
                @endif
            </div>
            <br> <br>
            <div class="row border p-2">
                <div class="w-100">
                    <label class="font-weight-bold col-sm-2">Thư viện ảnh:</label>
                    <div class="custom-file w-25">
                        <input type="file" class="form-control-file border" id="fileToUploads" name="fileToUploads[]" multiple >
                    </div>
                </div>
                <br> <br>
                <div class="row">
                    @foreach($pro->Image as $value)
                    <img style="width: 200px" class="border" src="acess/upload/product/libiry/{{$value->image}}" alt="">
                    @endforeach
                </div>
                @if($errors->has('fileToUploads'))
                    <p class="text-danger">{{$errors->first('fileToUploads')}}</p>
                @endif
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="pro_price" class="col-sm-4 col-form-label">Giá sản phẩm :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="pro_price" name="pro_price" value="{{$pro->pro_price}}">
                        </div>
                        @if($errors->has('pro_price'))
                            <p class="text-danger">{{$errors->first('pro_price')}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="pro_sale" class="col-sm-4 col-form-label">Giảm khuyến mãi :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="pro_sale" name="pro_sale" value="{{$pro->pro_sale}}">
                        </div>
                        @if($errors->has('pro_sale'))
                            <p class="text-danger">{{$errors->first('pro_sale')}}</p>
                        @endif
                        @if (session('alert'))
                            <p class="text-danger">{{session('alert')}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="description" class="font-weight-bold">Mô tả sản phẩm</label>
                <textarea class="form-control ckeditor" id="description" rows="3" name="description">{{$pro->pro_description}}</textarea>
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
                <textarea class="form-control ckeditor" id="sdescription" rows="3" name="sdescription">{{$pro->pro_sdescription}}</textarea>
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
                    <option {{$pro->status == 0 ? "selected='selected'" : ""}} value="0">Đăng</option>
                    <option {{$pro->status == 1 ? "selected='selected'" : ""}} value="1">Không đăng</option>
                </select>
            </div>
            <input class="btn btn-info d-block mx-auto" type="submit" value="Sửa sản phẩm">
        </form>
    </div>
    <?php

    function showCategories($categories, $parent_id = 0, $char = '',$selected=0)
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
