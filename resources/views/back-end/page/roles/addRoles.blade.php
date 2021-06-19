@extends('back-end.master')
@section('title')
    Danh sách quản trị viên
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Quản lý quyền User</h2>
        <div class="row">
            <div class="col-sm-8">
                <h4 class="text-center font-weight-bold">Danh sách quyền</h4>
                @if (session('message1'))
                    <div class="alert alert-danger text-center">
                        <strong>{{session('message1')}}</strong>
                    </div>
                @endif
                <table class="table list-cate">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên hiển thị</th>
                        <th scope="col">Tác vụ</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt=1; ?>
                    @foreach($roles as $value)
                        <tr>
                            <th scope="row">{{$stt++}}</th>
                            <td>{{$value->display_name}}</td>
                            <td>
                                @foreach($value->permission as $val)
                                    {{$val->display_name}} <br>
                                @endforeach
                            </td>
                            <td><a class="btn btn-success mr-1 text-white" href="admin/edit-role/{{$value->role_id}}"><i class="fas fa-edit"></i></a><a class="btn btn-danger text-white"  onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục ?');" href="admin/destroy-role/{{$value->role_id}}}"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4 border-left">
                <h4 class="text-center font-weight-bold">Thêm quyền mới</h4>
                @if (session('message'))
                    <div class="alert alert-success text-center">
                        <strong>{{session('message')}}</strong>
                    </div>
                @endif
                <form action="{{Route('Role.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="rolename">Role Name</label>
                        <input type="text" class="form-control" id="rolename" placeholder="VD: Admin,writer,.." name="rolename">
                        @if($errors->has('rolename'))
                            <p class="text-danger">{{$errors->first('rolename')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="displayname">Display Name</label>
                        <input type="text" class="form-control" id="displayname" placeholder="VD: Quản trị viên, Bloger,.." name="displayname">
                        @if($errors->has('displayname'))
                            <p class="text-danger">{{$errors->first('displayname')}}</p>
                        @endif
                    </div>
                    <label>Tác vụ</label>
                    <div class="border">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="checkedAll" id="checkedAll" >All
                            </label>
                        </div>
                        @foreach($permission as $val)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input checkSingle" name="permission[]" value="{{$val->per_id}}">{{$val->display_name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm">
                </form>
            </div>
        </div>
    </div>
    @if (session('message'))
        <script>
            $(document).ready(function(){
                swal("Thành công!", "{{session('message')}}", "success");
            });
        </script>
    @endif
@endsection
