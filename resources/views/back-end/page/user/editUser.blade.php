@extends('back-end.master')
@section('title')
    Sửa User
@endsection
@section('main')
    <div class="container pt-2">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Sửa User</h2>
    </div>
    <div class="container">
        <form action="{{Route('User.update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" value="{{$user->user_name}}" name="username">
                @if($errors->has('username'))
                    <p class="text-danger">{{$errors->first('username')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email">
                @if($errors->has('email'))
                    <p class="text-danger">{{$errors->first('email')}}</p>
                @endif
            </div>
            <label>Quyền</label>
            <div class="border">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="checkedAll[]" id="checkedAll" >All
                    </label>
                </div>
                @foreach($roles as $val)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input checkSingle" name="roles[]" value="{{$val->role_id}}" {{$listRoles->contains($val->role_id) ? 'checked' : ''}}>{{$val->role_name}}
                        </label>
                    </div>
                @endforeach
                @if($errors->has('roles'))
                    <p class="text-danger">{{$errors->first('roles')}}</p>
                @endif
            </div>
            <input class="btn btn-info d-block mx-auto" type="submit" value="Sửa">
        </form>
    </div>


@endsection
