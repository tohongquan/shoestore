<?php


namespace App\Helpers;


class Cart
{
    public static function getProduct($id)
    {
        return \App\Models\Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->where('id', $id)
            ->get();
    }

    public static function productscart($carts)
    {
        $html = '';
        $total = 0;
        foreach (array_keys($carts) as $item) {
            $id = explode('-', $item)[0];
            $size = explode('-', $item)[1];
            $product = self::getProduct($id)[0];
            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
            $priceEnd = $price * $carts[$item];
            $total += $priceEnd;
            $html .= '<tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="' . $product->thumb . '" alt="' . $product->name . '">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">' . $product->name . '</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">' . number_format($product->price, 0, '', '.') . '</td>
                                    <td class="total-col">' . $size . '</td>
                                    <input name="size" type="hidden" class="form-control" value="' . $size . '" required>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input name="num_product[' . $product->id . '-' . $size . ']" type="number" class="form-control" value="' . $carts[$item] . '" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">' . number_format($priceEnd, 0, '', '.') . '</td>
                                    <td class="remove-col"><a href="/carts/delete/' . $product->id . '-' . $size . '">Xóa</a></td>
                                </tr>
                            ';
        }
        return $html;
    }

    public static function total_carts($carts)
    {
        $total = 0;
        foreach (array_keys($carts) as $item) {
            $id = explode('-', $item)[0];
            $product = self::getProduct($id)[0];
            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
            $priceEnd = $price * $carts[$item];
            $total += $priceEnd;
        }

        return '<td>' . number_format($total, 0, '', '.') . '</td >';
    }
}
