<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Models\Product;
use App\Traits\Filter;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use Filter;
    protected $menu;

    public function __construct(MenuService $menu)
    {
        $this->menu = $menu;
    }

    public function index(Request $request, $id, $slug)
    {
        $sort = $request->sort;
        $menu = $this->menu->getId($id, $slug);
        if (isset($sort)) {
            $products = $this->filtersort($sort, $menu);
        } else {
            $products = $this->menu->getProduct($menu);
        }


        return view('client.product.listproducts', [
            'title' => 'Danh sách sản phẩm',
            'menu' => $menu,
            'products' => $products
        ]);
    }


}
