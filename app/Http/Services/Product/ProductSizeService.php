<?php


namespace App\Http\Services\Product;


use App\Models\Size;

class ProductSizeService
{
    public function detail($id)
    {
        $sizes = Size::select('size')->where('product_id', $id)->get();
        return $sizes;
    }
}
