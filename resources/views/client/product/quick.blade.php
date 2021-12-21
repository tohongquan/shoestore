@if(isset($product))
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title ml-3 mt-1" id="exampleModalLabel">Xem Nhanh</h5>
            <button type="button" class="close" style="padding: 1.5rem 1rem;margin: 0rem -1rem -1rem auto;"
                    data-dismiss="modal" aria-label="Close">
                <span style="font-size: 3rem" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container quickView-container">
                <div class="quickView-content">
                    <div class="row">
                        <div class="col-lg-7 col-md-6">

                            <div class="product-gallery">
                                <figure class="product-main-image">
                                    {!!  \App\Helpers\Product::checksale($product->price,$product->price_sale,$product->quantity) !!}
                                    <img id="product-zoom" src="{{$product->thumb}}"
                                         data-zoom-image="{{$product->thumb}}"
                                         alt="{{$product->name}}">
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery max-col-6">

                                    {{--                                    <a class="product-gallery-item" href="#"--}}
                                    {{--                                       data-image="{{$product->thumb}}"--}}
                                    {{--                                       data-zoom-image="{{$product->thumb}}">--}}
                                    {{--                                        <img src="{{$product->thumb}}"--}}
                                    {{--                                             alt="product cross">--}}
                                    {{--                                    </a>--}}
                                    {{--                                    --}}

                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .product-gallery -->

                        </div>
                        <div class="col-lg-5 col-md-6">
                            <h1 class="product-title" style="margin-top: 0px;">
                                {{$product->name}}
                            </h1><!-- End .product-title -->
                            <br>
                            <h3 class="product-price">
                                {!!  \App\Helpers\Product::checkprice($product->price,$product->price_sale,$product->quantity)!!}
                            </h3>
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
                                    </div>

                                    <input name="productid" type="hidden" value="{{$product->id}}">
                                    <div class="details-filter-row details-row-size">
                                        <label style="text-transform: inherit !important;">Số lượng:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" name="quantity" class="form-control" value="1" min="1"
                                                   max="10"
                                                   step="1"
                                                   data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->


                                    <div class="product-details-action">
                                        <input value="Thêm vào giỏ hàng" type="submit" class="btn-product btn-cart">
                                    </div>
                                @endif
                                @error('quantity')
                                <div class="text text-danger mb-3">{{ $message }}</div>
                                @enderror
                                @error('size')
                                <div class="text text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif



