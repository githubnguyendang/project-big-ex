@extends('back-end.master')
@section('title')
    Quản lý mã giảm giá
@endsection
@section('main')
<div class="container pt-5">
    <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Sửa mã giảm giá</h2>
        <div class="col-sm-12 border-left">
            <form action="{{route('Code.update')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$code->code_id}}">
                <div class="form-group">
                    <label for="codename">Mã giảm giá</label>
                    <input type="text" class="form-control" id="codename" value="{{$code->code_name}}" name="codename">
                </div>
                @if($errors->has('codename'))
                    <p class="text-danger">{{$errors->first('codename')}}</p>
                @endif
                <div class="form-group">
                    <label for="value">Giá trị mã (%)</label>
                    <input type="text" class="form-control" id="value" value="{{$code->code_value}}" name="value">
                </div>
                @if($errors->has('value'))
                    <p class="text-danger">{{$errors->first('value')}}</p>
                @endif
                <div class="form-group mb-4">
                    <label for="codestatus" class="font-weight-bold">Trạng thái</label>
                    <select class="form-control" id="codestatus" name="codestatus">
                        <option value="0">Sử dụng</option>
                        <option <?php if($code->code_status == 1){
                            echo 'selected';
                        } ?> value="1">Tắt</option>
                    </select>
                </div>
                <input class="btn btn-info d-block mx-auto" type="submit" value="Sửa">
            </form>
            @if(session('message'))
                <div class="alert text-center text-info">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
        </div>
</div>
@endsection
