<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản khách hàng</title>
    <link rel="shortcut icon" href="image/logoBook.png">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- Font Awesome CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- custom css fsile link  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/myaccount.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> Thư's BookStore </a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="Tìm kiếm" id="search-box">
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
            <a class="navbar_item" href="#home">Trang chủ</a>
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

<!-- prodcuts section starts  -->

<section class="products" id="products">

    <h1 class="heading"> <span>My account</span> </h1>
    <div class="order">
        <div class="container" style="display: flex;">
            <div class="order__tab">
                <a class="order__tab-link" id='order-tab-defalt-open' onclick="openTab(event,'orders')"><i class="fa fa-cart-arrow-down"></i>Đơn hàng</a>
                <a class="order__tab-link" onclick="openTab(event,'address')"><i class="fa fa-map-marker"></i>Địa chỉ thanh toán</a>
                <a class="order__tab-link" onclick="openTab(event,'detail-account')"><i class="fa fa-user"></i>Chi tiết tài khoản</a>
                <a href="{{URL::to('Customer/cart')}}" class="order__tab-link"><i class="fa fa-sign-out"></i>Exit</a>
            </div>
            <div class="order__wrapper">
                <div class="order__content" id='orders'>
                    <h2>Đơn hàng</h2>
                    <table class='table table-bordered'>
                        <thead>

                            <tr>
                                <th>
                                    Đơn hàng
                                </th>
                                <th style="max-width: 224px;width:224px;">
                                    Ngày lập
                                </th>
                                <th style="max-width: 185px;width: 185px;">
                                    Trạng thái
                                </th>
                                <th style="max-width: 135px;width: 135px;">
                                    Tổng
                                </th>
                                <th>
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $order)
                                <tr>
                                    <td>
                                       {{$order->id}}
                                    </td>
                                    <td style="max-width: 224px;">
                                        <p>
                                            {{$order->created_at}}
                                        </p>
                                    </td>
                                    <td style="max-width: 185px;">
                                        <p class='order__pending' style="color: black;">{{$order->status}}</p>
                                    </td>
                                    <td style="max-width: 135px;">
                                        <p>
                                           {{$order->total_money}}
                                        </p>
                                    </td>
                                    <td style="max-width: 142px;">
                                        <a href="s">Xem</a>
                                        <form action="{{URL::to('destroyorder/'.$order->id)}}" method = "POST">
                                            @csrf
                                            <button type="submit">Huy </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="order__content order__address" id='address'>
                    <h2>Địa chỉ thanh toán</h2>
                    
                        <p class="order__address-name">
                            @if(Session::get('customer'))
                              {{Session::get('customer')->username}}
                            @endif
                          </p>
                        <p class="order__address-text">
                            <select name="address" required id="address" size="1">
                                                   
                                @foreach ($name_address as $address)
                                <option   value="{{$address->id}}">{{$address->name_address}}</option>
                                @endforeach
                            
                            </select>
                        </p>
                        <p class="order__address-phone" style="letter-spacing: 1px;">Mobile:
                            @if(Session::get('customer'))
                              {{Session::get('customer')->phone}}
                            @endif
                          </p>
                    
                    <a href="" data-toggle="modal" data-target="#addressModel">
                        <i class="fa fa-edit"></i> Thêm địa chỉ
                    </a>
                </div>
                @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                        @endif
                <div class="order__content " id='detail-account'>
                    <h2>Chi tiết tài khoản</h2>
                    <form action="{{URL::to('change-password/'.Session::get('customer')->id)}}" class="order__account" method="POST">
                        @csrf
                        <div class='order__account-group'>
                            <label for="name">Họ và Tên</label>
                            <input type="text" value={{Session::get('customer')->username}} name='name' id='name'>
                        </div>
                        <div class='order__account-group'>
                            <label for="email">Địa chỉ Email</label>
                            <input type="email" name='email' id='email' value="{{Session::get('customer')->email}}">
                        </div>
                        <h3>Thay đổi mật khẩu</h3>
                        <div class='order__account-group order__account-group--row'>
                            <div class="">
                                <label for="new_password">Mật khẩu mới</label>
                                <input type="password" name='new_password' id='new_password'>
                            </div>
                            <div class="">
                                <label for="re_password">Nhập lại mật khẩu</label>
                                <input type="password" name='re_password' id='re_password'>
                            </div>
                        </div>
                        <button style="background-color: black;" type="submit" name="submit-info" class='order__account-btn'>Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    </div>

</section>

<!-- prodcuts section ends -->

<!-- footer section starts  -->

<footer id="footer" class="footer container-fluid">
    <h5 style="font-size: 20px; color: #ec455a;">About me</h5>
    <img class="footer__avatar" src="image/avatar.jpg">
    <div class="footer__info">
      <div>Nguyễn Thị Anh Thư - B1908364
        <br>
        Niên luận cơ sở - CT226 Nhóm 07
      </div>
      <ul class="footer__info__social">
        <li><a href="https://www.facebook.com/anhthutralongne" target="_blank"><img src="image/icon-facebook.svg" alt="Facebook icon"></a></li>
        <li><a href="https://github.com/ThuNguyen3108" target="_blank"><img src="image/icon-github.svg"alt="Github icon"></a></li>
        <li><a href="https://www.linkedin.com/in/nguy%E1%BB%85n-th%E1%BB%8B-anh-th%C6%B0-8b452b20a/" target="_blank"><img src="image/icon-linked.svg" alt="Linked icon"></a></li>
      </ul>
      <div class="footer__copyright">
        Copyright © 2022 Nguyễn Thị Anh Thư
      </div>
    </div>
  </footer>
  <div class="modal linear" id="addressModel" tabindex="-1" role="dialog" aria-labelledby="addressModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 16px;font-weight: 600;">Chỉnh sửa địa chỉ</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('Customer/addressOfmyaccout')}}" method="POST" class='modal__address-form'>
                    @csrf
                    <div class="form__group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" id='address' name='name_address'>

                    </div>
                    <div class="" style="float:right;">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                        <button  type="submit" class="btn btn-primary" name='submit-address'>Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  



<!-- footer section ends -->

<!-- loader  -->


<!-- Jquery -->

<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery.migrate.min.js')}}"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/vendor/slick.min.js')}}"></script>

<!-- Gsap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
<!-- Main script -->
<script src="{{asset('js/myaccount.js')}}"></script>

</body>
</html>