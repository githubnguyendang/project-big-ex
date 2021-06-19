@extends('back-end.master')
@section('title')
    Danh sách Keyword
@endsection
@section('main')
    <div class="container pt-5">
        <h2 class="text-center font-weight-bold text-danger border-bottom mb-3">Danh sách Keyword được tìm kiếm trên website</h2>
            <div class="row">
                <div class="col-sm-8">
                    <div class="col-sm-8 search">
                        <form action="{{route('Keyword.index')}}" method="get">
                            <div class="d-flex">
                                <input class="form-control" id="search" name="search" type="text" placeholder="Title bài viết...">
                                <button type="submit" class="btn btn-danger"><svg style="fill: #ffff;"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="20" height="20"><path d="M37.613,36.293l-9.408-9.432a15.005,15.005,0,1,0-1.41,1.414L36.2,37.707A1,1,0,1,0,37.613,36.293ZM3.992,17A12.967,12.967,0,1,1,16.959,30,13,13,0,0,1,3.992,17Z"></path></svg></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <form method="get" id="form_order" class=" pb-2" action="{{route('Keyword.index')}}">
                        <div class="form-group row">
                            <label class="col-sm-4" for="sel1">Sắp xếp theo:</label>
                            <select class="form-control order_by col-sm-8" name="order_by" id="order_by">
                                <option {{Request::get('order_by') == "max" || !Request::get('order_by') ? "selected='selected'" : ""}} value="max" >Số lượt tìm kiếm giảm giần</option>
                                <option {{Request::get('order_by') == "min" ? "selected='selected'" : ""}} value="min">Số lượt tìm kiếm tăng dần</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-center" scope="col">Keyword</th>
                <th class="text-center" scope="col">Số lượt tìm kiếm</th>
            </tr>
            </thead>
            <tbody>
            <?php $stt=1;?>
            @foreach($keyword as $val)
                <tr>
                    <th class="text-center" scope="row">{{$stt++}}</th>
                    <td class="text-center">{{$val->key_name}}</td>
                    <td class="text-center">{{$val->views}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div aria-label="Page navigation">
            {{$keyword->links()}}
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#order_by').change(function(){
                $('form#form_order').submit();
            });
        });
    </script>
@endsection
