@extends('back-end.master')
@section('title')
    Danh sách quản trị viên
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Quản lý quản trị viên</h2>
        <div class="row">
            <div class="col-sm-8">
                <h4 class="text-center font-weight-bold">Danh sách quản trị viên</h4>
                <table class="table list-cate">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">STT</th>
                        <th scope="col">User Name</th>
{{--                        <th scope="col">Email</th>--}}
                        <th scope="col">Quyền</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt=1; ?>
                    @foreach($user as $value)
                        <tr class="text-center">
                            <th scope="row">{{$stt++}}</th>
                            <td>{{$value->user_name}}</td>
                            <td>
                                @foreach($value->roles as $item)
                                    {{$item->display_name}} <br>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-success mr-1 text-white" href="admin/edit-user/{{$value->id}}"><i class="fas fa-edit"></i></a><a class="btn btn-danger text-white"  onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục ?');" href="admin/destroyUser/{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
                                <button data-url="{{route('User.password',$value->id)}}" class="btn btn-info btn-edit" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-key"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    <div aria-label="Page navigation" class="d-block mx-auto">
                        {{$user->links()}}
                    </div>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4 border-left">
                <h4 class="text-center font-weight-bold">Thêm quản trị viên mới</h4>
                <form action="{{Route('user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="username" placeholder="User Name" name="username">
                        @if($errors->has('username'))
                            <p class="text-danger">{{$errors->first('username')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        @if($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        @if($errors->has('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Password" name="password_confirmation">
                    </div>
                    <label>Quyền</label>
                    <div class="border">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="checkedAll" id="checkedAll" >All
                            </label>
                        </div>
                        @foreach($roles as $val)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input checkSingle" name="roles[]" value="{{$val->role_id}}" >{{$val->display_name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm">
                </form>
            </div>
        </div>
    </div>
{{--    Modal đổi pass--}}
    @include('back-end.page.user.modalPass')
        <script>
            $(document).ready(function(){
                @if (session('message'))
                    swal("Thành công!", "{{session('message')}}", "success");
                @endif
                $( ".btn-edit" ).click(function( event ) {
                    event.preventDefault();
                    var url = $(this).attr('data-url');
                    $(".form-pass").submit(function( event ) {
                        event.preventDefault();
                        var _token = $("input[name='_token']").val();
                        var password = $('#password_new').val();
                        var res_password= $('#res_password').val();
                        if (password == res_password){
                            $.ajax({
                                type:'post',
                                url: url,
                                data: {
                                    _token: _token,
                                    password: password,
                                },
                                success: function (data){
                                    swal("Thành công!", data.success, "success");
                                    $('.modal').modal('hide');
                                }
                            })
                        }else {
                            swal("Lỗi!", "Đổi password không thành công !", "error");
                        }
                    });
                });
            });
        </script>

@endsection
