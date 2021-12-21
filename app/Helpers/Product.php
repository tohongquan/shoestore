<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Product
{
    public static function active($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs ">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }

    public static function list($products)
    {
        $html = '';

        foreach ($products as $key => $product) {

            $html .= '
                    <tr>
                        <td id="id" class="text-center">' . $product->id . '</td>
                        <td  style="width: 150px;">' . $product->name . '</td>
                        <td class="text-center">' . number_format($product->price) . '</td>
                        <td class="text-center"><a href="' . $product->thumb . '"  target="_blank"><img src="' . $product->thumb . '" width="100px"></a></td>
                        <td class="text-center">' . self::active($product->active) . '</td>
                        <td class="text-center">' . $product->updated_at . '</td>
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="/admin/product/edit/' . $product->id . '">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $product->id . ', \'/admin/products/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';
        }
        return $html;
    }

    #Product home
    public static function show_product($products)
    {
        $html = '';

        foreach ($products as $item) {
            $html .= '<div class="product product-3 text-center">
                            <figure class="product-media">
                            <div>
                               ' . self::checksale($item->price, $item->price_sale, $item->quantity) . '
                              </div
                                <a href="' . $item->thumb . '">
                                    <img src="' . $item->thumb . '" alt="' . $item->name . '" class="product-image">
                                </a>

                                <div class="product-action-vertical">

                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media     -->

                            <div class="product-body">
                                <div class="product-cat">

                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="/san-pham/' . $item->id . '-' . Str::slug($item->name, '-') . '.html">' . $item->name . '</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                ' . self::checkprice($item->price, $item->price_sale, $item->quantity) . '
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-footer">
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #5f554b;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #806f55;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Thêm vào giỏ hàng"></a>
                                    <a href="" class="btn-product btnview" data-id="' . $item->id . '" data-toggle="modal" data-target="#myModal" title="Xem nhanh"></a>
                                </div><!-- End .product-action -->
                            </div>
                        </div>';
        }

        return $html;
    }

    #Product menu
    public static function show_product_menu($products)
    {
        $html = '';
        foreach ($products as $item) {
            $html .= ' <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                        <div class="product">

                            <figure class="product-media">

                                ' . self::checksale($item->price, $item->price_sale, $item->quantity) . '
                                <a href="/detail">
                                    <img src="' . $item->thumb . '" alt="' . $item->name . '"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action action-icon-top">
                                    <a href="#" class="btn-product btn-cart" title="Thêm vào giỏ hàng"></a>
                                    <a href="popup/quickView.html" class="btn-product btnview" data-id="' . $item->id . '" data-toggle="modal" data-target="#myModal" title="Xem nhanh"></a>
                                    <a href="#" class="btn-product btn-compare" title="Thêm vào danh sách yêu thích"></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Women</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="/san-pham/' . $item->id . '-' . Str::slug($item->name, '-') . '.html">' . $item->name . '</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price mt-2">
                                    ' . self::checkprice($item->price, $item->price_sale, $item->quantity) . '
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 0 Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" style="background: #cc9966;"><span class="sr-only">Color name</span></a>
                                    <a href="#" class="active" style="background: #ebebeb;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->';
        }
        return $html;
    }

    public static function discount_calculation($price, $price_sale)
    {
        $result = ($price - $price_sale) / $price;
        return round($result * 100);
    }

    public static function checksale($price, $price_sale, $quantity)
    {
        switch ($quantity) {
            case 0:
                return '<span class="product-label label-out">Hết hàng</span>';
            default:
                $html = '';
                if ($price_sale != null || $price_sale != 0) {
                    $html .= '<span class="product-label label-sale">-' . self::discount_calculation($price, $price_sale) . '%</span>';
                }
                if ($price == 0 && $price_sale == 0) {
                    $html .= '<span class="product-label label-out">Sản phẩm sắp có</span>';
                }
                return $html;
        }
    }

    public static function checkprice($price, $price_sale, $quantity)
    {
        switch ($quantity) {
            case 0:
                return '<span class="text-dark">Liên hệ</span>';
            default:
                if ($price_sale != 0) {
                    return '<span class="new-price">' . number_format($price_sale) . '</span>
                                    <span class="old-price">' . number_format($price) . '</span>';
                } elseif ($price == 0 && $price_sale == 0) {
                    return '<span class="text-dark">Liên hệ</span>';
                } else {
                    return '<span class="text-primary">' . number_format($price) . '</span>';
                }
        }
    }
}
