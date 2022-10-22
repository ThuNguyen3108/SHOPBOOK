<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon"
    href="{{asset('images/home/picwish.png')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>


    <title>LogIn</title>
</head>
<body>
    @include('sweetalert::alert')
    <a href="index.html"><img id="logoEco" src="img/LogoLogin.svg" alt=""></a>
    <div class="container">
        <form name="loginForm" action="{{URL::to('login-customer')}}" method="post" id="login" class="form" enctype="application/x-www-form-urlencoded">

            @csrf
            <h1 class="form-title">Đăng nhập</h1>
            {{-- <h3 class="form-slogan"></h3> --}}
            <!-- <div class="form-message form-error"></div> -->
            <div class="form-input-group">
                <label for="fullname" class="form-label">Email</label>
                <input name ="email" required type="text" id="fullname" class="form-input" autofocus placeholder="Vui lòng nhập email của bạn">
                <div class="form-input-error-message"></div>
            </div>
            <div class="form-input-group">
                <label for="psw" class="form-label">Mật khẩu</label>
                <input required type="password" id="psw" name="password" class="form-input" autofocus placeholder="Password">
                <div class="form-input-error-message"></div>
            </div>
            <button class="form-button" type="submit">Tiếp tục</button>
            <p class="form-text">
                <a href="#" class="form-link">Bạn quên mật khẩu?</a>
            </p>
            <p class="form-text">
                <a href="{{URL::to('Customer/signup')}}" class="form-link" id="linkCreateAccount">Bạn chưa có tài khoản? Tạo tài khoản</a>
            </p>
        </form>
        {{-- @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                        @endif --}}

    </div>


</body>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</html>
    {{-- @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif --}}





