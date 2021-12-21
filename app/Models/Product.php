<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'menu_id',
        'price',
        'price_sale',
        'active',
        'hot',
        'quantity',
        'description',
        'content',
        'thumb',
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }

    public function images()
    {
        return $this->hasMany(Product_image::class, 'product_id', 'id');
    }

    public static function search($key_product, $paginate)
    {
        $products = Product::where('active', 1)->where('name', 'LIKE', '%' . $key_product . '%')->paginate($paginate, ['*'], 'product');
        return $products;
    }

}
