<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
    <link rel="shortcut icon"
    href="{{asset('images/home/picwish.png')}}">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/productcustomer.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">

</head>
<body>
    @include('sweetalert::alert')

<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> Thư's BookStore </a>

        <form action="{{URL::to('Customer/search')}}" method = "post" class="search-form">
            @csrf
            <input type="search" name="timkiem" placeholder="Tìm kiếm" id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="{{URL::to('Customer/cart')}}" class="fas fa-shopping-cart"></a>
            @if(Session::get('customer'))

                <a href="{{URL::to('Customer/myaccount')}}"><div id="login-btn" class="fas fa-user">{{Session::get('customer')->username}}</div>
                <a href="{{URL::to('Customer/logout')}}"><div id="login-btn" class="fa fa-power-off"></div>
            @else
            <a href="{{URL::to('Customer/login')}}"><div id="login-btn" class="fas fa-user"></div>
            @endif
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a class="navbar_item" href="{{URL::to('Customer/indexcustomer')}}">Trang chủ</a>
            <div class="navbar_item"  id="loai-sach">Loại sách
                <ul class="sub-menu">
                    @foreach($category as $category)
                    <li><a href="{{URL::to('productcustomer/'.$category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <a class="navbar_item" href="#featured">Bán chạy</a>
            <a class="navbar_item" href="#arrivals">Đặc sắc</a>
            <a class="navbar_item" href="#reviews">Đánh giá</a>
            <a class="navbar_item" href="#blogs">blogs</a>
        </nav>
    </div>

</header>

<!-- header section ends -->

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#blogs" class="fas fa-blog"></a>
</nav>

<!-- login form  -->


<!-- home section starts  -->

@yield('content');

<!-- blogs section ends -->

<!-- footer section starts  -->

<footer id="footer" class="footer container-fluid">
    <h5 style="font-size: 20px; color: #ec455a;">About me</h5>
    <img class="footer__avatar" src="{{asset('images/home/avatar.jpg')}}">
    <div class="footer__info">
      <div>Nguyễn Thị Anh Thư - B1908364
        <br>
        Niên luận cơ sở - CT226 Nhóm 07
      </div>
      <ul class="footer__info__social">
        <li><a href="https://www.facebook.com/anhthutralongne" target="_blank"><img src="{{asset('images/home/icon-facebook.svg')}}" alt="Facebook icon"></a></li>
        <li><a href="https://github.com/ThuNguyen3108" target="_blank"><img src="{{asset('images/home/icon-github.svg')}}"alt="Github icon"></a></li>
        <li><a href="https://www.linkedin.com/in/nguy%E1%BB%85n-th%E1%BB%8B-anh-th%C6%B0-8b452b20a/" target="_blank"><img src="{{asset('images/home/icon-linked.svg')}}" alt="Linked icon"></a></li>
      </ul>
      <div class="footer__copyright">
        Copyright © 2022 Nguyễn Thị Anh Thư
      </div>
    </div>
  </footer>





<!-- footer section ends -->

<!-- loader  -->

<div class="loader-container">
    <img src = "{{asset('images/home/loader-img.gif')}}" alt="">
</div>


{{-- chat bot --}}













<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
