@extends('client.main')

@section('content')
    <form method="post">
        <div class="page-header text-center"
             style="background-image: url('/template/client/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Giỏ Hàng<span>Shoe Store</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ Hàng</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">

                            @php $total = 0; @endphp
                            @if(count($products)!=0)
                                <table class="table table-cart table-mobile">
                                    <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Size</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>&nbsp;</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    {!! \App\Helpers\Cart::productscart($carts) !!}
                                    </tbody>
                                </table><!-- End .table table-wishlist -->
                            @else
                                <div class="text-center"><h2>Giỏ hàng trống</h2></div>
                            @endif
                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="#">
                                        <div class="input-group">
                                            {{--                                        <input type="text" class="form-control" required placeholder="coupon code">--}}
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i
                                                        class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- End .input-group -->
                                    </form>
                                </div><!-- End .cart-discount -->

                                <input value="Cập nhật" type="submit" formaction="/update-cart"
                                       class="btn btn-outline-dark-2">
                                @csrf
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Đơn hàng</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-total">
                                        <td>Tổng:</td>
                                        @if(isset($cart))
                                            {!! \App\Helpers\Cart::total_carts($carts) !!}
                                        @endif
                                    </tr><!-- End .summary-total -->
                                    </tbody>

                                </table><!-- End .table table-summary -->
                                <div>
                                    <span>Thông tin khách hàng :</span>
                                    <br>
                                    <br>
                                    <div>
                                        <input class="form-control text-other" type="text" name="name"
                                               @if(Session::has('firstname_client'))
                                               value="{{Session::get('firstname_client') . ' ' . Session::get('lastname_client')}}"
                                               @endif
                                               placeholder="Tên khách hàng">
                                    </div>
                                    @error('name')
                                    <div class="text text-danger mb-3">{{ $message }}</div>
                                    @enderror

                                    <div>
                                        <input class="form-control text-other" type="text" name="phone" placeholder="Số điện thoại"
                                               @if(Session::has('phone_client'))
                                               value="{{Session::get('phone_client')}}"
                                        @endif" >
                                    </div>
                                    @error('phone')
                                    <div class="text text-danger mb-3">{{ $message }}</div>
                                    @enderror

                                    <div>
                                        <input class="form-control text-other" type="text" name="address" placeholder="Địa chỉ giao hàng"
                                               @if(Session::has('address_client'))
                                               value="{{Session::get('address_client')}}"
                                            @endif>
                                    </div>
                                    @error('address')
                                    <div class="text text-danger mb-3">{{ $message }}</div>
                                    @enderror

                                    <div>
                                        <input class="form-control text-other" type="text" name="email" placeholder="Email liên hệ"
                                               @if(Session::has('email_client'))
                                               value="{{Session::get('email_client')}}" s
                                            @endif>
                                    </div>
                                    @error('email')
                                    <div class="text text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                    <div>
                                        <textarea class="form-control text-other" name="content"></textarea>
                                    </div>

                                    <button class="btn btn-outline-primary-2">Đặt hàng</button>
                                </div>

                            </div><!-- End .summary -->

                            <a href="/" class="btn btn-outline-dark-2 btn-block mb-3">
                                <span>
                                    Tiếp tục mua hàng
                                </span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </form>
@endsection


@section('footer')
    <style>
        .text-other{
            font-weight: 400;
            letter-spacing: 0.2px;
            color: #445f84;
        }
    </style>
@endsection
