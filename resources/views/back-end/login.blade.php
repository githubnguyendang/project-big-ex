<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="acess/css/bootstrap.min.css">
    <script src="acess/js/bootstrap.min.js"></script>
</head>
<body>
<h4 class="text-center col-md-10 pt-5 ml-5">Đăng nhập</h4>
<form class="w-25 d-block mx-auto pt-3" action="{{route('login')}}" method="POST">
    @csrf
{{--    <div class="form-group">--}}
{{--        <label>Email:</label>--}}
{{--        <input type="email" class="form-control" placeholder="Email" name="email" id="email">--}}
{{--        @if($errors->has('email'))--}}
{{--            <p class="text-danger">{{$errors->first('email')}}</p>--}}
{{--        @endif--}}
{{--    </div>--}}
    <div class="form-group">
        <label>User name:</label>
        <input type="text" class="form-control" placeholder="User_name" name="user_name" id="user_name">
        @if($errors->has('user_name'))
            <p class="text-danger">{{$errors->first('user_name')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Enter password" id="password" >
        @if($errors->has('password'))
            <p class="text-danger">{{$errors->first('password')}}</p>
        @endif
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" name="remember" for="remember">Ghi nhớ tôi </label>
    </div>
    <input type="submit" value="Đăng nhập" class="btn btn-danger"> <br> <br>
    @if (session('message'))
        <div class="alert alert-danger text-center">
            <strong>{{session('message')}}</strong>
        </div>
    @endif
</form>
</body>
</html>
