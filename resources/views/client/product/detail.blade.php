@extends('client.main')
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <!--MainContent-->
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="\">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="#">
                        @foreach($menus as $item)
                            @if($item->id==$product->menu_id)
                                {{$item->name}}
                            @endif
                        @endforeach
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <figure class="product-main-image">
                                <span class="product-label label-sale">Sale</span>
                                <img id="product-zoom" src="{{$product->thumb}}"
                                     data-zoom-image="{{$product->thumb}}"
                                     alt="{{$product->name}}">

                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                            </figure><!-- End .product-main-image -->

                            <div id="product-zoom-gallery" class="product-image-gallery max-col-6">

                                <a class="product-gallery-item" href="#"
                                   data-image="{{$product->thumb}}"
                                   data-zoom-image="{{$product->thumb}}">
                                    <img src="{{$product->thumb}}"
                                         alt="{{$product->name}}">
                                </a>

                                @foreach($productImage as $item)
                                    <a class="product-gallery-item" href="#"
                                       data-image="{{$item->image}}"
                                       data-zoom-image="{{$item->image}}">
                                        <img src="{{$item->image}}"
                                             alt="{{$item->image_name}}">
                                    </a>
                                @endforeach

                            </div><!-- End .product-image-gallery -->
                        </div><!-- End .product-gallery -->
                    </div>

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->

                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews
                                    )</a>

                            </div><!-- End .rating-container -->
                            <div class="product-content">
                                {!!  $product->description!!}
                            </div><!-- End .product-content -->
                            <div class="product-price">
                                {!!  \App\Helpers\Product::checkprice($product->price,$product->price_sale,$product->quantity)!!}
                            </div><!-- End .product-price -->

                            <form action="/add-cart" method="post">
                                @if($product->price != null)
                                    @csrf
                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Kích cỡ:</label>
                                        <div class="select-custom">
                                            <select name="size" class="form-control">
                                                <option selected="selected">Chọn kích cỡ</option>
                                                @foreach($productSizes as $item)
                                                    <option value="{{$item->size}}">{{$item->size}}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .details-filter-row -->
                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Số lượng:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" name="quantity" value="1" min="1"
                                                   max="10"
                                                   step="1"
                                                   data-decimals="0" class="form-control">
                                        </div><!-- End .product-details-quantity -->
                                        <input name="productid" type="hidden" value="{{$product->id}}">

                                        {{--                                    <input name="productgia" type="hidden" value="{{$product->price}}">--}}
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <input value="Thêm vào giỏ hàng" type="submit" class="btn-product btn-cart">

                                        <div class="details-action-wrapper">
                                            {{--                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Thêm vào danh sách--}}
                                            {{--                                            yêu thích</span></a>--}}
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->
                                @endif
                                @error('quantity')
                                <div class="text text-danger mb-3">{{ $message }}</div>
                                @enderror
                                @error('size')
                                <div class="text text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </form>

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Danh Mục:</span>

                                    @foreach($menus as $item)
                                        @if($item->id==$product->menu_id)
                                            <a href="/danh-muc/{{$item->id}}-{{$item->slug}}.html">{{$item->name}}</a>
                                        @endif
                                    @endforeach
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="fa fa-facebook" title="Facebook"></a>
                                    <a class="fa fa-youtube" title="Youtube"></a>
                                    <a href="#" class="fa fa-twitter" title="Twitter"></a>
                                    <a href="#" class="fa fa-google" title="Google"></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                               role="tab" aria-controls="product-desc-tab" aria-selected="true">Mô tả chi tiết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                               href="#product-shipping-tab"
                               role="tab" aria-controls="product-shipping-tab" aria-selected="false">Giao Hàng & Trả
                                Lại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                               role="tab" aria-controls="product-review-tab" aria-selected="false">Đánh Giá (2)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                             aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Mô tả chỉ tiết</h3>
                                <div>

                                    {!!  $product->content !!}

                                </div>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                             aria-labelledby="product-shipping-link">
                            <div class="product-desc-content">
                                <h3>Giao hàng và trả lại</h3>
                                <div>
                                    Nội dung
                                </div>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                             aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Đánh giá (2)</h3>
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">Samanta J.</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">6 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">

                                            <div class="review-content">
                                                <p>Đánh giá của khách hàng 1</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Hữu ích (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Không hữu ích (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">

                                            <div class="review-content">
                                                <p>Đánh giá của khách hàng 1</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Hữu ích (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Không hữu ích (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <h2 class="title text-center mb-4">Các sản phẩm khác</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                     data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
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
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>

                    @foreach($products as $item)
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                {!!  \App\Helpers\Product::checksale($item->price,$item->price_sale,$item->hot,$item->quantity)!!}
                                <a href="/san-pham/{{$item->id}}-{{\Illuminate\Support\Str::slug($item->name,'-')}}.html">
                                    <img src="{{$item->thumb}}" alt="{{$item->name}}"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Thích</span></a>
                                    <a href="#" class="btn-product-icon btn-quickview btn-expandable"
                                       title="Xem nhanh"><span>Xem nhanh</span></a>
                                    <a href="#" class="btn-product-icon btn-compare btn-expandable"
                                       title="So sách"><span>So sách</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Shoes</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title">
                                    <a href="/san-pham/{{$item->id}}-{{\Illuminate\Support\Str::slug($item->name,'-')}}.html">{{$item->name}}</a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price mt-2">
                                    {!!  \App\Helpers\Product::checkprice($item->price,$item->price_sale,$item->quantity)!!}
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 1 Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
        @endsection

        @section('footer')
            <style>
                .fa {
                    padding: 0.9rem;
                    font-size: 1rem;
                    width: 3rem;
                    height: 3rem;
                    text-align: center;
                    text-decoration: none;
                    margin: 5px 3px;
                    border-radius: 50%;
                }

                .fa:hover {
                    opacity: 0.7;
                }

                .fa-facebook {
                    background: #3B5998;
                    color: white;
                }

                .fa-twitter {
                    background: #55ACEE;
                    color: white;
                }

                .fa-google {
                    background: #dd4b39;
                    color: white;
                }

                .fa-youtube {
                    background: #bb0000;
                    color: white;
                }
            </style>
            <!-- Sticky Bar -->
            <div class="sticky-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <figure class="product-media">
                                <a href="/san-pham/{{$product->id}}-{{\Illuminate\Support\Str::slug($product->name,'-')}}.html">
                                    <img src="{{$product->thumb}}" alt="{{$product->name}}">
                                </a>
                            </figure><!-- End .product-media -->
                            <h4 class="product-title">
                                <a href="/san-pham/{{$product->id}}-{{\Illuminate\Support\Str::slug($product->name,'-')}}.html">
                                    {{$product->name}}
                                </a>
                            </h4>
                            <!-- End .product-title -->
                        </div><!-- End .col-6 -->

                        <div class="col-6 justify-content-end">
                            <div class="product-price">
                                {!!  \App\Helpers\Product::checkprice($product->price,$product->price_sale,$product->quantity)!!}
                            </div><!-- End .product-price -->
                            <div class="product-details-quantity">
                                <input type="number" value="1" min="1" max="10"
                                       step="1" data-decimals="0" name="quantity">
                            </div><!-- End .product-details-quantity -->

                            <div class="product-details-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                <a href="#" class="btn-product btn-wishlist"
                                   title="Wishlist"><span>Add to Wishlist</span></a>
                            </div><!-- End .product-details-action -->
                        </div><!-- End .col-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .sticky-bar -->
            <script src="/template/client/js/bootstrap.bundle.min.js"></script>
            <script src="/template/client/js/jquery.elevateZoom.min.js"></script>
@endsection


