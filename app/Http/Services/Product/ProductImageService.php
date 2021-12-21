<?php


namespace App\Http\Services\Product;


use App\Models\Product_image;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\Session;

class ProductImageService
{
    use UploadFile;

    public function destroy($request)
    {
        $productimage = Product_image::where('id', $request->input('id'))->first();
        if ($productimage) {
            $productimage->delete();
            return true;
        }
        return false;
    }

    public function update($request, $product_images)
    {
        $data_file = $this->storageUpload($request, 'thumb', 'products');

        if ($data_file == null) {
            $thumb = $request->input('thumb_late');
            $image_name = $request->input('image_name_late');
        } else {
            $thumb = $data_file['file_data'];
            $image_name = $data_file['file_name'];
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");

        $product_id = $request->product_id;
        $product_images->image = $thumb;
        $product_images->image_name = $image_name;
        $product_images->updated_at = $date;
        $product_images->product_id = $product_id;
        $product_images->save();

        Session::flash('success', 'Cập nhật hình ảnh sản phẩm thành công');
        return true;
    }

    public function detail($id)
    {
        $images = Product_image::select('image', 'image_name')->where('product_id', $id)->inRandomOrder()->take(6)->get();
        return $images;
    }
}
