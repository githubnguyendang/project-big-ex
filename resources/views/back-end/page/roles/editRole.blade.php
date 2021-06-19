@extends('back-end.master')
@section('title')
    Sửa Quyền
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Sửa Roles</h2>
        <div class="col-sm-12 border-left">
                <h4 class="text-center font-weight-bold">Thêm quyền mới</h4>
                <form action="{{Route('Role.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="role_id" value="{{$role->role_id}}">
                    <div class="form-group">
                        <label for="rolename">Role Name</label>
                        <input type="text" class="form-control" id="rolename" value="{{$role->role_name}}" name="rolename">
                        @if($errors->has('rolename'))
                            <p class="text-danger">{{$errors->first('rolename')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="displayname">Display Name</label>
                        <input type="text" class="form-control" id="displayname" value="{{$role->display_name}}" name="displayname">
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
                                    <input type="checkbox" class="form-check-input checkSingle" name="permission[]" value="{{$val->per_id}}" {{$listPer->contains($val->per_id) ? 'checked' : ''}}>{{$val->display_name}}
                                </label>
                            </div>
                        @endforeach
                        @if($errors->has('permission'))
                            <p class="text-danger">{{$errors->first('permission')}}</p>
                        @endif
                    </div>
                    <input class="btn btn-info d-block mx-auto" type="submit" value="Sửa">
                </form>
        </div>
    </div>
@endsection
