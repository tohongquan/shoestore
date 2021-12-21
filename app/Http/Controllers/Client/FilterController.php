<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use App\Models\Product;
use App\Traits\Filter;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    use Filter;

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function filter(Request $request)
    {
        $sort = $request->sort;
        $slug = $request->slug;
        $id = $request->id;
        $products = $this->filtersort($sort, $id, $slug);
        return view('client.product.list', [
            'products' => $products,
            'title' => 'Danh Sách Sản Phẩm'
        ]);
    }
}
