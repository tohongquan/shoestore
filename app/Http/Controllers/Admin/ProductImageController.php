<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductImageService;
use App\Models\Product_image;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    protected $productimageService;

    public function __construct(ProductImageService $productimageService)
    {
        $this->productimageService = $productimageService;
    }

    public function list_image($id)
    {
        $product_images = Product_image::where('product_id', $id)->get();
        return response()->json([
            'error' => false,
            'product_images' => $product_images
        ]);
    }

    public function show(Product_image $product_image)
    {
        return view('admin.products.edit_images', [
            'title' => 'Chỉnh ảnh sản phẩm',
            'product_id' => $product_image->product_id,
            'product_image' => $product_image
        ]);
    }

    public function update(Product_image $product_image, Request $request)
    {
        $this->productimageService->update($request, $product_image);
        return redirect('/admin/product/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->productimageService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công ảnh sản phẩm'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
