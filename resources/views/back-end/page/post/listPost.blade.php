@extends('back-end.master')
@section('title')
    Danh sách vài viết
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-3">Danh sách bài viết</h2>
        <div class="row">
            <div class="col-sm-8">
                <div class="col-sm-8">
                    <form action="{{route('Post.index')}}" method="get">
                        <div class="d-flex">
                            <input class="form-control" id="search" name="search" type="text" placeholder="Title bài viết...">
                            <button type="submit" class="btn btn-danger"><svg style="fill: #ffff;"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="20" height="20"><path d="M37.613,36.293l-9.408-9.432a15.005,15.005,0,1,0-1.41,1.414L36.2,37.707A1,1,0,1,0,37.613,36.293ZM3.992,17A12.967,12.967,0,1,1,16.959,30,13,13,0,0,1,3.992,17Z"></path></svg></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <form method="get" id="form_order" class=" pb-2" action="{{route('Post.index')}}">
                    <div class="form-group row">
                        <label class="col-sm-4" for="sel1">Sắp xếp theo:</label>
                        <select class="form-control order_by col-sm-8" name="order_by" id="order_by">
                            <option {{Request::get('order_by') == "new" || !Request::get('order_by') ? "selected='selected'" : ""}} value="new" >Mới nhất</option>
                            <option {{Request::get('order_by') == "old" ? "selected='selected'" : ""}} value="old">Cũ nhất</option>
                            <option {{Request::get('order_by') == "view" ? "selected='selected'" : ""}} value="view">Theo View</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề bài viết</th>
                        <th scope="col">Views</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ngày viết</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                <?php $stt = 1 ?>
                @foreach($post as $value)
                    <tr class="text-center">
                        <th scope="row">{{$stt++}}</th>
                        <td>{{$value->title}}</td>
                        <td>{{$value->views}}</td>
                        <td>{{$value->status == 0 ? "Đăng" : "Không đăng"}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>
                            <a class="btn btn-success  text-white"  href="admin/edit-post/{{$value->post_id}}"><i class="fas fa-edit"></i></a><a class="btn btn-danger text-white ml-1" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết ?');" href="admin/destroy-post/{{$value->post_id}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div aria-label="Page navigation">
            {{$post->links()}}
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#order_by').change(function(){
                $('form#form_order').submit();
            });
            @if (session('message'))
            swal("Thành công!", "{{session('message')}}", "success");
            @endif
        });
    </script>
@endsection

