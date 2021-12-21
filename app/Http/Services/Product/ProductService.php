<?php


namespace App\Http\Services\Product;


use App\Models\Menu;
use App\Models\Product;


use App\Models\Product_image;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{
    use UploadFile;

    public function getAll()
    {
        return Product::paginate(6);
    }

    public function isValidPrice($request)
    {
        $price = $request->price;
        $price_sale = $request->price_sale;

        if ($price < $price_sale && $price_sale != 0 && $price != 0) {
            Session::flash('error', 'Giá gốc phải lớn hơn giá nhập!!!');
            return false;
        }
        if ($price_sale != 0 && $price == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc!!!');
            return false;
        }
        return true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) {
            return false;
        }

        $data_file = $this->storageUpload($request, 'thumb', 'products');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $name = $request->input('name');
        $menu_id = $request->input('menu_id');
        $price = $request->input('price');
        $price_sale = $request->input('price_sale');
        $active = $request->input('active');
        $quantity = $request->input('quantity');
        $hot = $request->input('hot');
        $description = $request->input('description');
        $content = $request->input('content');
        $thumb = $data_file['file_data'];

        try {
            $product = Product::create([
                'name' => $name,
                'active' => $active,
                'hot' => $hot,
                'description' => $description,
                'menu_id' => $menu_id,
                'price' => $price,
                'quantity' => $quantity,
                'content' => $content,
                'price_sale' => $price_sale,
                'thumb' => $thumb,
                'created_at' => $date,
                'updated_at' => $date
            ]);

            if ($request->hasFile('path_image')) {
                $image_multiple = $request->file('path_image');
                foreach ($image_multiple as $item) {
                    $data_file_multiple = $this->storageUpload_Multiple($item, 'products');
                    $product->images()->create([
                        'image' => $data_file_multiple['file_data'],
                        'image_name' => $data_file_multiple['file_name'],
                        'created_at' => $date,
                        'updated_at' => $date
                    ]);
                }
            }

            Session::flash('success', 'Thêm sản phẩm thành công!!!');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm sản phẩm lỗi!!!' . $err->getMessage());
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $product): bool
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) {
            return false;
        }
        $data_file = $this->storageUpload($request, 'thumb', 'products');
        if ($data_file == null) {
            $thumb = $request->input('thumb_late');
        } else {
            $thumb = $data_file['file_data'];
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $name = $request->input('name');
        $menu_id = $request->input('menu_id');
        $price = $request->input('price');
        $price_sale = $request->input('price_sale');
        $active = $request->input('active');
        $quantity = $request->input('quantity');
        $hot = $request->input('hot');
        $description = $request->input('description');
        $content = $request->input('content');

        if ($request->hasFile('path_image')) {
            $image_multiple = $request->file('path_image');
            foreach ($image_multiple as $item) {
                $data_file_multiple = $this->storageUpload_Multiple($item, 'products');
                $product->images()->create([
                    'image' => $data_file_multiple['file_data'],
                    'image_name' => $data_file_multiple['file_name'],
                    'created_at' => $date,
                    'updated_at' => $date
                ]);
            }
        }

        $product->name = $name;
        $product->menu_id = $menu_id;
        $product->active = $active;
        $product->price = $price;
        $product->price_sale = $price_sale;
        $product->quantity = $quantity;
        $product->hot = $hot;
        $product->description = $description;
        $product->content = $content;
        $product->thumb = $thumb;
        $product->updated_at = $date;
        $product->save();

        Session::flash('success', 'Cập nhật thành công sản phẩm');
        return true;
    }

    public function destroy($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            Product_image::where('product_id', $request->input('id'))->delete();
            return true;
        }
        return false;
    }

    public function search($request)
    {
        $name = $request->get('name');
        $products = Product::where('name', 'like', '%' . $name . '%')->get();
        return $products;
    }
}
