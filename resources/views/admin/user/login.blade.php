<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/template/admin/images/logo.jpg">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="/template/admin/css/style.css" rel="stylesheet">
    <link rel="icon" href="/template/admin/image/logo_admin.png" type="image/png">
</head>

<body class="h-100">
    <div class="login-form-bg h-100 container">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#">

                                    <img src="/template/admin/image/logo.jpg" class="mx-auto d-block rounded-circle btn btn-primary"
                                        alt="Logo Store" width="120">
                                    <h4 class="text text-primary">ADMIN</h4>
                                </a>
                                <form action="/admin/login/store" method="POST" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input name="email" class="form-control" placeholder="Email" style="padding-left: 22px;">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password" style="padding-left: 22px;">
                                        <span toggle="#password-field"
                                            class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="remember">Remember me</label>
                                        <input type="checkbox" name="remember">
                                    </div>
                                    @error('password')
                                    <div class="text text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                    @error('email')
                                    <div class="text text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                    @include('admin.alert')
                                    <button class="btn login-form__btn submit w-100">Đăng Nhập</button>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
    <style>
        .field-icon {
            float: right;
            width: 3.5em !important;
            margin-left: -25px;
            margin-top: -30px;
            position: relative;
            z-index: 2;
            color: black;
        }

    </style>
    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#password");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>

</html>
