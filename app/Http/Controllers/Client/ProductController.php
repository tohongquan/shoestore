<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductImageService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Product\ProductServiceClient;
use App\Http\Services\Product\ProductSizeService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $productImage;
    protected $productSize;

    public function __construct(ProductServiceClient $product, ProductImageService $productImage, ProductSizeService $productSizeService)
    {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productSize = $productSizeService;
    }

    public function index($id, $slug)
    {
        $product = $this->product->detail($id);
        $productsMore = $this->product->more($id, $product->menu_id);
        $productImage = $this->productImage->detail($id);
        $productSize = $this->productSize->detail($id);

        return view('client.product.detail',
            [
                'title' => $product->name,
                'product' => $product,
                'menus' => $this->product->getMenu(),
                'productSizes' => $productSize,
                'productImage' => $productImage,
                'products' => $productsMore
            ]);
    }

    public function quick(Request $request)
    {
        $id = $request->id;
        $product = $this->product->detail($id);
        $productImage = $this->productImage->detail($id);
        $productSize = $this->productSize->detail($id);

        return view('client.product.quick',
            [
                'product' => $product,
                'productSizes' => $productSize,
                'productImage' => $productImage,
            ]);
    }
}
