<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon"
    href="{{asset('images/home/picwish.png')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>BookStore LogIn</title>

</head>
<body>

    <div class="container">
        <form name="loginForm" action="{{URL::to('loginadmin')}}" method="post" id="login" class="form" enctype="application/x-www-form-urlencoded" onsubmit="">
            @csrf
            <h1 class="form-title">Đăng nhập</h1>
            <h3 class="form-slogan">Đăng nhập bằng tài khoản admin để vào trang quản lý</h3>
            <!-- <div class="form-message form-error"></div> -->
            <div class="form-input-group">
                <label for="fullname" class="form-label">Email</label>
                <input required type="text" id="fullname" name="fullname" class="form-input" autofocus placeholder="Vui lòng nhập email của bạn">
                <div class="form-input-error-message"></div>
            </div>
            <div class="form-input-group">
                <label for="psw" class="form-label">Password</label>
                <input required type="password" id="psw" name="psw" class="form-input" autofocus placeholder="Vui lòng nhập password của bạn">
                <div class="form-input-error-message"></div>
            </div>
            <button class="form-button" type="submit">Đăng nhập</button>


</body>
</html>
