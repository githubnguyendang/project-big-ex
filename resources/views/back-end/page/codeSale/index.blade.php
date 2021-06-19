@extends('back-end.master')
@section('title')
    Quản lý mã giảm giá
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Quản lý mã giảm giá</h2>
        <div class="row">
            <div class="col-sm-8">
                <h4 class="text-center font-weight-bold">Danh sách mã giảm giá</h4>
                @if (session('message1'))
                    <div class="alert alert-success text-center">
                        <strong>{{session('message1')}}</strong>
                    </div>
                @endif
                <table class="table list-cate">
                    <thead>
                    <tr>
                        <th style="text-align:center" scope="col">STT</th>
                        <th style="text-align:center" scope="col">Mã giảm giá</th>
                        <th style="text-align:center" scope="col">Giá trị mã</th>
                        <th style="text-align:center" scope="col">Trạng thái</th>
                        <th style="text-align:center" scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1 ?>
                    @foreach($code as $val)
                        <tr>
                            <th style="text-align:center" scope="row">{{$stt++}}</th>
                            <td style="text-align:center">{{$val->code_name}}</td>
                            <td style="text-align:center">-{{$val->code_value}} %</td>
                            <td style="text-align:center">
                                @if($val->code_status == 0)
                                    Sử dụng
                                @else
                                    Tắt
                                @endif
                            </td>
                            <td style="text-align:center"><a  href="admin/sua-ma-giam-gia/{{$val->code_id}}">Sửa</a> | <a  onclick="return confirm('Bạn có chắc chắn muốn xóa mã giảm giá ?');" href="admin/xoa-ma-giam-gia/{{$val->code_id}}">Xóa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div aria-label="Pagination Navigation" class="mb-4 text-info">
                    {{$code->links()}}
                </div>
            </div>
            <div class="col-sm-4 border-left">
                <h4 class="text-center font-weight-bold">Thêm mã giảm giá mới</h4>
                <form action="{{route('Code.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="codename">Mã giảm giá</label>
                        <input type="text" class="form-control" id="codename" placeholder="VD: ABCD12" name="codename">
                    </div>
                    @if($errors->has('codename'))
                        <p class="text-danger">{{$errors->first('codename')}}</p>
                    @endif
                    <div class="form-group">
                        <label for="value">Giá trị mã (%)</label>
                        <input type="text" class="form-control" id="value" placeholder="VD: 50" name="value">
                    </div>
                    @if($errors->has('value'))
                        <p class="text-danger">{{$errors->first('value')}}</p>
                    @endif
                    <div class="form-group mb-4">
                        <label for="codestatus" class="font-weight-bold">Trạng thái</label>
                        <select class="form-control" id="codestatus" name="codestatus">
                            <option selected value="0">Sử dụng</option>
                            <option value="1">Tắt</option>
                        </select>
                    </div>
                    <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm">
                </form>
                @if(session('message'))
                    <div class="alert text-center text-info">
                        <strong>{{session('message')}}</strong>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
