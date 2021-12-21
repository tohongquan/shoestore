@extends('client.main')
@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="\">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
        style="background-image: url('/template/client/images/banner.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                aria-controls="signin-2" aria-selected="true">Đăng Nhập</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form action="/login/store" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="E-mail">
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }} *</div>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }} *</div>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Đăng Nhập</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>



                                    <a href="#" class="forgot-link">Quên mật khẩu?</a>
                                </div><!-- End .form-footer -->
                                @csrf
                            </form>
                            <div class="form-choice">
                                <p class="text-center">hoặc đăng nhập với</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Đăng nhập bằng Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Đăng nhập bằng Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
@endsection
