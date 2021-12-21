<?php

namespace App\Http\Controllers\Client;

use App\Http\Services\Product\ProductService;
use App\Http\Services\Product\ProductServiceClient;
use App\Models\Product;
use App\Traits\Filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Sliders\SliderService;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu, ProductServiceClient $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index()
    {
        return view('client.home', [
            'title' => 'Cửa hàng bán giày Nhóm4',
            'sliders' => $this->slider->show(),
            'products_sale' => $this->product->show('price_sale'),
            'products_new' => $this->product->show('new'),
            'products_hot' => $this->product->show('hot'),
            'banners' => $this->slider->show()
        ]);
    }

    public function search(Request $request)
    {
        $key_product = $request->products;
        $products = Product::where('active', 1)->where('name', 'LIKE', '%' . $key_product . '%')->paginate(8);
        return view('client.product.listproducts',
            [
                'title' => 'Tìm kiếm sản phẩm',
            ])->with('products', $products);
    }

    use Filter;

    public function show(Request $request)
    {
        $sort = $request->sort;
        if (isset($sort)) {
            $products = $this->filtersort2($sort);
        } else {
            $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb', 'quantity')
                ->where('active', 1)->paginate(12);
        }
        return view('client.product.listproducts',
            [
                'title' => 'Tất cả sản phẩm',
                'products' => $products
            ]);
    }

    public function tag($name)
    {
        $products = $this->product->tag($name);
        $title = '';
        switch ($name) {
            case 'sale':
                $title = 'Các sản phẩm sale';
                break;
            case 'hot':
                $title = 'Các sản phẩm hot';
                break;
            case 'new':
                $title = 'Các sản phẩm mới nhất';
                break;
            default:
                return 'abc';
        }
        return view('client.product.listproducts',
            [
                'title' => $title,
                'products' => $products
            ]);
    }
}
