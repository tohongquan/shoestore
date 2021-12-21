<header class="header header-8">
    @include('client.head')
    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="\" class="logo">
                    <img src="/template/client/images/logo/logo.png" class="mylogo" alt="Molla Logo"
                         width="105" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-right">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="active">
                            <a href="/" class="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="\san-pham.html" class="">Sản phẩm</a>
                            <ul>{!! \App\Helpers\Menu::menus($menus) !!}</ul>
                        </li>

                        <li><a href="\about.html">About Us</a></li>

                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->

                <div class="header-search">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="/search" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Tìm kiếm</label>
                            <input type="search" class="form-control" name="products" placeholder="Tên sản phẩm"
                                   required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->


                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" data-display="static">
                        <a href="/carts" style="font-size: 30px;" class="icon-shopping-cart"></a>
                        <span
                            class="cart-count">{{!is_null(\Session::get('carts'))? count(\Session::get('carts')):0}}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        @php $sumPriceCart =0;
                        @endphp
                        <div class="dropdown-cart-products">
                            @if(isset($products_cart))
                                @foreach($products_cart as $key => $product)
                                    @php $price =\App\Helpers\Product::checkprice($product->price ,$product->price_sale,$product->quantity) ;
                                    $sumPriceCart+=$product->price_sale!=0 ? $product->price_sale : $product->price;
                                    @endphp
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="/san-pham/{{$product->id }} - {{Str::slug($product->name, '-') }}.html">
                                                    {{$product->name}}
                                                </a>
                                            </h4>

                                            <span class="cart-product-info">
                                        <span class="cart-product-qty">{!!$price!!}</span>

                                    </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{$product->thumb}}" alt="product">
                                            </a>
                                        </figure>
                                        <a href="/carts/delete/{{$product->id}}" class="btn-remove" title="Xóa sản phẩm trong giỏ hàng"><i
                                                class="icon-close"></i></a>
                                    </div><!-- End .product -->
                                @endforeach
                            @endif
                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Tổng</span>

                            <span class="cart-total-price">{{number_format($sumPriceCart,'0','','.')}}</span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="/cart.html" class="btn btn-primary">Giỏ hàng</a>
                            <a href="/check" class="btn btn-outline-primary-2"><span>Thanh toán</span><i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
{{--                <div class="dropdown cart-dropdown">--}}
{{--                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                       aria-expanded="false" data-display="static">--}}
{{--                        <i class="icon-shopping-cart"></i>--}}
{{--                        <span--}}
{{--                            class="cart-count">{{!is_null(\Session::get('carts'))? count(\Session::get('carts')):0}}</span>--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                        @php--}}
{{--                            echo dd($products);--}}
{{--                            $sumPriceCart =0;--}}
{{--                        @endphp--}}

{{--                        <div class="dropdown-cart-products">--}}
{{--                            @if(count($products)>0)--}}
{{--                                @foreach($products as $key => $product)--}}
{{--                                    @php--}}
{{--                                        $sumPriceCart += $product->price_sale!=0 ? $product->price_sale : $product->price;--}}
{{--                                    @endphp--}}
{{--                                    <div class="product">--}}
{{--                                        <div class="product-cart-details">--}}
{{--                                            <h4 class="product-title">--}}
{{--                                                <a href="product.html">{{$product->name}}</a>--}}
{{--                                            </h4>--}}

{{--                                            <span class="cart-product-info">--}}
{{--                                        <span--}}
{{--                                            class="cart-product-qty">{!!\App\Helpers\Product::checkprice($product->price ,$product->price_sale,$product->quantity)!!}</span>--}}

{{--                                    </span>--}}
{{--                                        </div><!-- End .product-cart-details -->--}}

{{--                                        <figure class="product-image-container">--}}
{{--                                            <a href="product.html" class="product-image">--}}
{{--                                                <img src="{{$product->thumb}}" alt="product">--}}
{{--                                            </a>--}}
{{--                                        </figure>--}}
{{--                                        <a href="#" class="btn-remove" title="Remove Product"><i--}}
{{--                                                class="icon-close"></i></a>--}}
{{--                                    </div><!-- End .product -->--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </div><!-- End .cart-product -->--}}

{{--                        <div class="dropdown-cart-total">--}}
{{--                            <span>Total</span>--}}

{{--                            <span class="cart-total-price">{{number_format($sumPriceCart,'0','','.')}}</span>--}}
{{--                        </div><!-- End .dropdown-cart-total -->--}}

{{--                        <div class="dropdown-cart-action">--}}
{{--                            <a href="/cart" class="btn btn-primary">View Cart</a>--}}
{{--                            <a href="/check" class="btn btn-outline-primary-2"><span>Checkout</span><i--}}
{{--                                    class="icon-long-arrow-right"></i></a>--}}
{{--                        </div><!-- End .dropdown-cart-total -->--}}
{{--                    </div><!-- End .dropdown-menu -->--}}
{{--                </div><!-- End .cart-dropdown -->--}}
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->


</header><!-- End .header -->


