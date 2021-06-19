@extends('back-end.master')
@section('title')
    Thêm bài viết mới
@endsection
@section('main')
    <div class="container pt-2">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Thêm bài viết mới</h2>
        <form action="{{Route('Post.store')}}" method="POST" enctype="multipart/form-data" id="form-product">
            @csrf
            <div class="form-group">
                <label for="title" class="font-weight-bold">Title bài viết</label>
                <input type="text" class="form-control" id="title" placeholder="Tiêu đề bài viết" name="title">
                @if($errors->has('title'))
                    <p class="text-danger">{{$errors->first('title')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="description" class="font-weight-bold">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Tiêu đề bài viết" name="description">
                @if($errors->has('description'))
                    <p class="text-danger">{{$errors->first('description')}}</p>
                @endif
            </div>
            <label class="font-weight-bold">Thumbnail bài viết</label>
            <div class="custom-file w-25">
                <input type="file" class="form-control-file border" id="fileToUpload" name="fileToUpload">
            </div>
            @if($errors->has('fileToUpload'))
                <p class="text-danger">{{$errors->first('fileToUpload')}}</p>
            @endif
            <br>
            <br>
            <div class="form-group">
                <label for="content" class="font-weight-bold">Nội dung bài viết</label>
                <textarea class="form-control ckeditor" id="noidung" rows="3" name="noidung"></textarea>
                @if($errors->has('noidung'))
                    <p class="text-danger">{{$errors->first('noidung')}}</p>
                @endif
                <script>
                    var editor = CKEDITOR.replace('noidung',{
                        language: 'vi',
                        filebrowserImageBrowseUrl: 'acess/editor/ckeditor/ckfinder/ckfinder.html?Type=Image',
                        filebrowserFlashBrowseUrl: 'acess/editor/ckeditor/ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl: 'acess/editor/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl: 'acess/editor/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    });
                </script>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái bài viết</label>
                <select class="form-control" id="status" name="status">
                    <option value="0">Đăng</option>
                    <option value="1">Không đăng</option>
                </select>
            </div>
            <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm bài viết">
        </form>
    </div>
    @if (session('message'))
        <script>
            $(document).ready(function(){
                swal("Thành công!", "{{session('message')}}", "success");
            });
        </script>
    @endif
@endsection
