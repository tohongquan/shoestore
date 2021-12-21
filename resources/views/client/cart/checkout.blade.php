@extends('client.main')
@section('content')
    <div class="page-header text-center" style="background-image: url('/template/client/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Thanh Toán<span>Shoe Store</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh Toán</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="checkout-title">Chi tiết thanh toán</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Họ Tên *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Tỉnh / Thành *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-sm-4">
                                    <label>Quận / Huyện *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-sm-4">
                                    <label>Phường / Xã *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Phường / Xã *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Số điện thoại *</label>
                                    <input type="tel" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Email *</label>
                            <input type="email" class="form-control" required>



                            <label>Ghi chú</label>
                            <textarea class="form-control" cols="30" rows="4"
                                placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: lưu ý đặc biệt để giao hàng"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-6">
                            <div class="summary">
                                <h3 class="summary-title">Đơn Hàng Của Bạn</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Sản Phẩm</th>
                                            <th>Ảnh</th>
                                            <th>Thanh Toán</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><a href="#">Name 1</a></td>
                                            <td> <img width="100px" src="/template/client/images/product/home7-product2.jpg"
                                                    alt="product cross">
                                            </td>
                                            <td>$84.00</td>
                                        </tr>

                                        <tr>
                                            <td><a href="#">Name 2</a></td>
                                            <td> <img width="100px" src="/template/client/images/product/home7-product2.jpg"
                                                    alt="product cross">
                                            </td>
                                            <td>$76,00</td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>Tổng Phụ:</td>
                                            <td></td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Giao Hàng:</td>
                                            <td></td>
                                            <td>Miễn Phí Vận Chuyển</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Tổng:</td>
                                            <td></td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <a role="button" data-toggle="collapse" href="#collapse-1"
                                                    aria-expanded="true" aria-controls="collapse-1">
                                                    Chuyển khoản ngân hàng trực tiếp
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                            data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Thực hiện thanh toán của bạn trực tiếp vào
                                                tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn
                                                làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được chuyển cho đến
                                                khi tiền đã hết trong tài khoản của chúng tôi.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-2">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                    href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                    Check payments
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                            data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Mô tả
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                    href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Thanh Toán Khi Giao Hàng
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                            data-parent="#accordion-payment">
                                            <div class="card-body">Người mua hàng sẽ thanh toán tiền
                                                trực tiếp cho shipper (nhân viên giao hàng) khi hàng được giao đến
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-4">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                    href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-4" class="collapse" aria-labelledby="heading-5"
                                            data-parent="#accordion-payment">
                                            <div class="card-body"> Mô tả
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                    href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                    Thẻ Tín Dụng
                                                    <img src="/template/client/images/payments-summary.png" alt="payments cards">
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                                            data-parent="#accordion-payment">
                                            <div class="card-body"> Thanh Toán Qua Thẻ Tín Dụng
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
@endsection
