<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/home/picwish.png')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <title>SignIn</title>

</head>
<body>

        <div class="container-signup">

            @include('sweetalert::alert')
            @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
           {{$error}}
        @endforeach
    </div>
@endif

            <form action="{{URL::to('signup-customer')}}" class="form" method="POST" id="createAccount">

                @csrf
                <h1 class="form-title">ĐĂNG KÝ</h1>
                <div class="form-message form-error"></div>
                <div class="form-input-group">
                    <label for="fullname" class="form-label">Tên tài khoản</label>
                    <input required name = "username" type="text" id="signupUsername" class="form-input" autofocus placeholder="Vui lòng nhập tên của bạn">
                    <div class="form-input-error-message"></div>
                </div>
                <div class="form-input-group">
                    <label for="signupEmail" class="form-label">Email</label>
                    <input required type="email" name = "email" id="signupEmail" class="form-input" autofocus placeholder="Vui lòng nhập địa chỉ email">
                    <div class="form-input-error-message"></div>
                </div>
                <div class="form-input-group">
                    <label for="signupEmail" class="form-label">Số điện thoại</label>
                    <input required type="text" name = "phone" id="signupEmail" class="form-input" autofocus placeholder="Vui lòng nhập số điện thoại">
                    <div class="form-input-error-message"></div>
                </div>
                <div class="form-input-group">
                    <label for="signupPassword" class="form-label">Mật khẩu</label>
                    <input required type="password" name = "password" id="signupPassword" class="form-input" autofocus placeholder="Vui lòng nhập mật khẩu">
                    <div class="form-input-error-message"></div>
                </div>
                <div class="form-input-group">
                    <label for="signupPassword2" class="form-label">Xác nhận mật khẩu</label>
                    <input required type="password" name = "re_password" id="signupPassword2" class="form-input" autofocus placeholder="Vui lòng xác nhận mật khẩu">
                    <div class="form-input-error-message"></div>
                </div>
                <button class="form-button" type="submit">Tiếp tục</button>
                <p class="form-text">
                    <a href="{{URL::to('Customer/login')}}" class="form-link" id="linkLogin">Bạn có tài khoản? Đăng nhập</a>

                </p>
            </form>


        </div>
</body>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</html>
