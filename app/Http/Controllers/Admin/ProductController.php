<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Menu\MenuService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $menu;
    protected $productService;

    public function __construct(ProductService $productService, MenuService $menu)
    {
        $this->productService = $productService;
        $this->menu = $menu;
    }

    public function create()
    {
        return view('admin.products.add', [
            'title' => 'Thêm sản phẩm',
            'menus' => $this->menu->getAll()
        ]);
    }

    public function store(ProductFormRequest $request)
    {
        $this->productService->insert($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.products.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->getAll()
        ]);
    }

    public function show(Product $product)
    {
        return view('admin.products.edit', [
            'title' => 'Chỉnh sửa sản phẩm',
            'product' => $product,
            'menus' => $this->menu->getAll()
        ]);
    }

    public function update(Product $product, Request $request)
    {
        $this->productService->update($request, $product);

        return redirect('/admin/product/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function search(Request $request)
    {
        if ($request->get('name')) {
            $products = $this->productService->search($request);
            return $products;
        }
    }
}
