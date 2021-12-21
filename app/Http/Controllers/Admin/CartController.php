<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customercart;
use Illuminate\Http\Request;
use App\Http\Services\CartService;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart=$cart;
    }

    public function index()
    {
        return view('admin.carts.customer',[
            'title'=>'Danh sách đơn đặt hàng',
            'customers'=>$this->cart->getCustomer()
        ]);
    }

    public function show(Customercart $customer)
    {
        $carts =$this->cart->getProductForCart($customer);
        return view('admin.carts.detail',[
            'title'=>'Chi tiết đơn hàng: ' .$customer->name,
            'customer'=>$customer,
            'carts'=>$carts
        ]);
    }
}
