<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCartFormRequest;
use App\Http\Requests\OrderFormRequest;
use App\Http\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;

    }

    public function index(AddCartFormRequest $request)
    {

        $result = $this->cartService->addcartproduct($request);
        if($result){
            Session::flash('cart_add_success','Thêm vào giỏ hàng thành công');
        }else{
            Session::flash('cart_add_error','Thêm vào giỏ hàng lỗi');
        }
        return redirect()->back();
    }

    public function show()
    {
        $products = $this->cartService->getProduct();
        return view('client.cart.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(AddCartFormRequest $request)
    {
        $this->cartService->update($request);
        return redirect('/carts');
    }

    public function remove($productid = 0, $size)
    {
        $this->cartService->remove($productid, $size);

        return redirect('/carts');
    }

    public function addGioHang(OrderFormRequest $request)
    {
        $this->cartService->addCarts($request);
        return redirect()->back();
    }
}
