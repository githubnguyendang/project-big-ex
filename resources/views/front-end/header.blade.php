<div class="header-top bg bg-success">
    <p class="text-white text-center p-1">Chợ sách online số 1 Việt Nam</p>
</div>
<div class="header-main container shadow bg-body">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top mb-3 ">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="{{route('home')}}">THEGIOISACH.VN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <div class="position-relative form_search col-sm-6 p-0 me-sm-3">
                    <form action="{{route('Home.search')}}" class="needs-validation" method="get" novalidate>
                        <div class="d-flex mx-auto">
                            <input class="form-control" id="search" name="search" type="text" placeholder="Tìm kiếm sản phẩm..." required>
                            <button id="btn_search" type="submit" class="btn btn-success"><svg style="fill: #ffff;"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="20" height="20"><path d="M37.613,36.293l-9.408-9.432a15.005,15.005,0,1,0-1.41,1.414L36.2,37.707A1,1,0,1,0,37.613,36.293ZM3.992,17A12.967,12.967,0,1,1,16.959,30,13,13,0,0,1,3.992,17Z"></path></svg></i></button>
                        </div>
                    </form>
                    
                </div>	
                <a href="{{route('Cart.index')}}" class="text-center mx-sm-2">
                    <i class="fas fa-shopping-cart fs-20 text-primary icon"></i><span class="text-danger fs-12 fw-bold">({{$cart->total_quantity}})</span>
                    <p class="p-0 m-0 fs-13 fw-bold">Giỏ hàng</p>
                </a>
                @if($user = Auth::user())
                    <div class="dropdown">
                        <span class="btn dropdown-toggle text-primary fw-bold" role="button" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user mx-1"></i>
                            <span>{{Auth::user()->user_name}}</span>
                        </span>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item nav-link text-primary fw-bold fs-13" href="{{route('admin')}}"> 
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}"class="dropdown-item nav-link text-primary fw-bold fs-13">
                                    <i class="fas fa-sign-out-alt nav-icon"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{route('admin')}}" class="text-center mx-sm-2">
                        <i class="fas fs-20 fa-sign-in-alt"></i>
                        <p class="p-0 m-0 fs-13 fw-bold">Đăng Nhập</p>
                    </a>
                @endif
            </div>
        </div>
    </nav>
</div>


<div class="w3-content w3-section container shadow bg-body pt-2">
    @foreach($slider_main as $val)
    <img class="mySlides" src="acess/upload/slider/{{$val->image}}" style="width:100%;height: 450px">
    @endforeach
</div>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
    (function () {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()

</script>

