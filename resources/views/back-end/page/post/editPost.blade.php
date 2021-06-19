@extends('back-end.master')
@section('title')
    Sửa bài viết
@endsection
@section('main')
    <div class="container pt-2">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Sửa bài viết</h2>
        @if (session('message'))
            <div class="alert alert-success text-center">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
        <form action="{{Route('Post.update')}}" method="POST" enctype="multipart/form-data" id="form-product">
            @csrf
            <input type="hidden" name="id" value="{{$post->post_id}}">
            <input type="hidden"name="thumbnai_old" value="{{$post->thumbnail}}">
            <div class="form-group">
                <label for="title" class="font-weight-bold">Title bài viết</label>
                <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title">
                @if($errors->has('title'))
                    <p class="text-danger">{{$errors->first('title')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="description" class="font-weight-bold">Description</label>
                <input type="text" class="form-control" id="description" value="{{$post->description}}" name="description">
                @if($errors->has('description'))
                    <p class="text-danger">{{$errors->first('description')}}</p>
                @endif
            </div>
            <label class="font-weight-bold">Thumbnail bài viết</label>
            <img style="width: 200px" src="acess/upload/post/{{$post->thumbnail}}" alt=""> <br>
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
                <textarea class="form-control ckeditor" id="content" rows="3" name="noidung">{{$post->content}}</textarea>
                @if($errors->has('noidung'))
                    <p class="text-danger">{{$errors->first('noidung')}}</p>
                @endif
                <script>
                    var editor = CKEDITOR.replace('noidung',{
                        language: 'vi',
                        filebrowserImageBrowseUrl: 'acess/editor/ckfinder/ckfinder.html?Type=Image',
                        filebrowserFlashBrowseUrl: 'acess/editor/ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl: 'acess/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl: 'acess/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    });
                </script>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái bài viết</label>
                <select class="form-control" id="status" name="status">
                    <option {{$post->status == 0 ? "selected = 'selected'" : ""}} value="0">Đăng</option>
                    <option {{$post->status == 1 ? "selected = 'selected'" : ""}} value="1">Không đăng</option>
                </select>
            </div>
            <input class="btn btn-info d-block mx-auto" type="submit" value="Sửa bài viết">
        </form>
    </div>
@endsection
