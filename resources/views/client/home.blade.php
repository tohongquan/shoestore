@extends('client.main')
@section('content')
    <div class="container">
        @include('client.slider')
    </div><!-- End .container -->



    <div class="icon-boxes-container icon-boxes-separator bg-transparent">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-primary">
                            <i class="icon-rocket"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title"> Miễn phí ship</h3><!-- End .icon-box-title -->
                            <p>đơn hàng từ 1,000,000</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-primary">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Miễn phí trả hàng</h3><!-- End .icon-box-title -->
                            <p>trong 30 ngày</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-primary">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Nhận ưu đãi 10%</h3><!-- End .icon-box-title -->
                            <p>khi bạn đăng kí</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-primary">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Chúng tôi hộ trợ</h3><!-- End .icon-box-title -->
                            <p>24/7 về các dịch vụ</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->

    <div class="banner-group">
        <div class="container">
            @include('client.banner')
        </div><!-- End .container -->
    </div><!-- End .banner-group -->

    <div class="bg-light pt-5 pb-10 mb-3">
        @if($products_hot->count()!=0)
            <div class="container">
                <div class="heading  mb-3">
                    <span class="heading-left title-lg">Sản phẩm hot</span><!-- End .title -->

                    <span style="float: right;">
                    <a href="/tag-hot.html" class="btn btn-link btn-link-dark">
                        <span>Xem tất cả</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </span>

                    <hr class="hr-style">
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane tab-pane-shadow p-0 fade show active" id="new-all-tab" role="tabpanel"
                         aria-labelledby="new-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl"
                             data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 0,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                            {!! \App\Helpers\Product::show_product($products_hot) !!}
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container -->
            <br>
            <br>
            <br>
        @endif

        @if($products_new->count()!=0)
            <div class="container">
                <div class="heading  mb-3">
                    <span class="heading-left title-lg">Sản phẩm mới</span><!-- End .title -->

                    <span style="float: right;">
                    <a href="/tag-new.html" class="btn btn-link btn-link-dark">
                        <span>Xem tất cả</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </span>

                    <hr class="hr-style">
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane tab-pane-shadow p-0 fade show active" id="new-all-tab" role="tabpanel"
                         aria-labelledby="new-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl"
                             data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 0,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                            {!! \App\Helpers\Product::show_product($products_new) !!}
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container -->
            <br>
            <br>
            <br>
        @endif
        @if($products_sale->count()!=0)
            <div class="container">
                <div class="heading  mb-3">
                    <span class="heading-left title-lg">Sản phẩm giảm giá</span><!-- End .title -->

                    <span style="float: right;">
                    <a href="/tag-sale.html" class="btn btn-link btn-link-dark">
                        <span>Xem tất cả</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </span>

                    <hr class="hr-style">
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane tab-pane-shadow p-0 fade show active" id="new-all-tab" role="tabpanel"
                         aria-labelledby="new-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl"
                             data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 0,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                            {!! \App\Helpers\Product::show_product($products_sale) !!}
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container -->
        @endif
    </div><!-- End .bg-light -->


    <div class="mb-4"></div><!-- End .mb-4 -->

    <div class="mb-5"></div><!-- End .mb5 -->

@endsection

@section('ban')


    <footer class="footer footer-dark">
        <div class="cta bg-image bg-dark pt-4 pb-5 mb-0"
             style="background-image: url(/template/client/images/demo-3.jpg); ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-8 col-lg-6">
                        <div class="cta-heading text-center">
                            <h3 class="cta-title text-danger">Đăng ký nhận thông tin sản phẩm của chúng tôi</h3>
                            <!-- End .cta-title -->
                        </div><!-- End .text-center -->
                        <br>
                        <form action="#">
                            <div class="input-group input-group-round">
                                <input type="email" class="form-control form-control-white"
                                       placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn btn-white" type="submit"><span>Subscribe</span><i
                                            class="icon-long-arrow-right"></i></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                        <br>
                        <br>
                        <br>
                    </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cta -->
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="widget widget-about">
                            <img src="/template/client/images/logo.jpg" class="footer-logo" alt="Footer Logo"
                                 width="105" height="25">
                            <br>
                            <br>
                            <div class="social-icons">
                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                        class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                        class="icon-twitter"></i></a>
                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                        class="icon-instagram"></i></a>
                                <a href="#" class="social-icon" title="Youtube" target="_blank"><i
                                        class="icon-youtube"></i></a>
                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                        class="icon-pinterest"></i></a>
                            </div><!-- End .soial-icons -->
                        </div><!-- End .widget about-widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        {{--                            <div class="widget">--}}
                        {{--                                <h4 class="widget-title">Menu Nhanh</h4><!-- End .widget-title -->--}}

                        {{--                                <ul class="widget-list">--}}
                        {{--                                    <li><a href="about.html">Danh Mục 1</a></li>--}}
                        {{--                                    <li><a href="#">Danh Mục 2</a></li>--}}
                        {{--                                    <li><a href="faq.html">Danh Mục 3</a></li>--}}
                        {{--                                </ul><!-- End .widget-list -->--}}
                        {{--                            </div><!-- End .widget -->--}}
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">Dịch Vụ Chăm Sóc Khách Hàng</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="#">Phương Thức Thanh Toán</a></li>
                                <li><a href="#">Trả hàng</a></li>
                                <li><a href="#">Giao Hàng</a></li>
                                <li><a href="#">Các điều khoản và điều kiện</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">Tài Khoản Của Tôi</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="/login">Đăng Nhập</a></li>
                                <li><a href="cart.html">Giỏ Hàng</a></li>
                                <li><a href="#">Danh Sách Yêu Thích</a></li>
                                <li><a href="#">Kiểm tra đơn hàng</a></li>
                                <li><a href="#">Trợ giúp</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .footer-middle -->

        <div class="footer-bottom">
            <div class="container">
                <p class="footer-copyright">Copyright © 2021 by Nhóm 4 - Cường - Danh - Linh - Quân. All Rights
                    Reserved.</p>
                <!-- End .footer-copyright -->
            </div><!-- End .container -->
        </div><!-- End .footer-bottom -->
    </footer><!-- End .footer -->
@endsection

@section('footer')
    <script src="/template/client/js/bootstrap.bundle.min.js"></script>
    <script src="/template/client/js/jquery.elevateZoom.min.js"></script>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg" style="max-width: 800px !important;" id="ok">
            @include('client.product.quick')
        </div>
    </div>
    <style>
        .btnview:before {
            content: '\f145';
        }
    </style>
    <script>
        $('.btnview').click(function () {
            var id = $(this).attr('data-id');

            $.ajax({
                type: 'GET',
                datatype: 'JSON',
                data: {id},
                url: "/quickView",
                success: function (result) {
                    $('#ok').html(result);
                }
            });
        });
    </script>
@endsection
