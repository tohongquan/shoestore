<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Client\Users\LoginController as UsersLoginController;
use App\Http\Controllers\Client\Users\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Client\MainController as ClientMainController;
use \App\Http\Controllers\Admin\ProductImageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login/store', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('/user/update', [LoginController::class, 'update']);

        Route::get('/main', [MainController::class, 'index'])->name('admin');
        Route::get('logout', [LoginController::class, 'logout']);

        #DanhMuc
        Route::get('menus/add', [MenuController::class, 'create']);
        Route::post('menus/add/store', [MenuController::class, 'store']);
        Route::get('menus/list', [MenuController::class, 'index']);
        Route::DELETE('menus/destroy', [MenuController::class, 'destroy']);
        Route::get('menus/edit/{menu}', [MenuController::class, 'show']);
        Route::post('menus/edit/{menu}', [MenuController::class, 'update']);
        Route::post('menus/active/{menu}', [MenuController::class, 'edit']);

        #Slider
        Route::prefix('slider')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add/store', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::post('active/{slider}', [SliderController::class, 'edit']);

        });

        #Product
        Route::prefix('product')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);

            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);

            Route::get('list', [ProductController::class, 'index']);
            Route::delete('destroy', [ProductController::class, 'destroy']);

            Route::get('list-image/{id}', [ProductImageController::class, 'list_image']);
            Route::get('search', [ProductController::class, 'search']);
        });

        #Product_image
        Route::prefix('products-image')->group(function () {
            Route::get('edit/{product_image}', [ProductImageController::class, 'show']);
            Route::post('edit/{product_image}', [ProductImageController::class, 'update']);
            Route::delete('destroy', [ProductImageController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);

        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);


    });

});

Route::post('/register/store', [RegisterController::class, 'store']);

Route::post('/login/store', [UsersLoginController::class, 'store']);

Route::get('/logout', [RegisterController::class, 'logout']);

Route::get('/search', [ClientMainController::class, 'search']);

Route::get('/', [ClientMainController::class, 'index'])->name('home');

Route::get('danh-muc/{id}-{slug}.html', [\App\Http\Controllers\Client\MenuController::class, 'index']);

Route::get('san-pham.html', [ClientMainController::class, 'show']);

Route::get('san-pham/{id}-{slug}.html', [\App\Http\Controllers\Client\ProductController::class, 'index']);


Route::get('/check', function () {
    return view('client.cart.checkout', ['title' => 'Thanh Toán']);
});

Route::get('/about.html', function () {
    return view('client.infor.about', ['title' => 'Thông tin về chúng tôi']);
});

Route::get('/login.html', function () {
    return view('client.login.login', ['title' => 'Đăng Nhập']);
});

Route::get('/register.html', function () {
    return view('client.login.register', ['title' => 'Đăng Kí']);
});

Route::get('/tag-{name}.html', [ClientMainController::class, 'tag']);

Route::post('/add-cart', [\App\Http\Controllers\Client\CartController::class, 'index']);

Route::get('/cart.html', [\App\Http\Controllers\Client\CartController::class, 'show'])->name('carts');

Route::post('update-cart', [\App\Http\Controllers\Client\CartController::class, 'update']);

Route::get('/carts/delete/{productid}-{size}', [\App\Http\Controllers\Client\CartController::class, 'remove']);

Route::post('/cart.html', [\App\Http\Controllers\Client\CartController::class, 'addGioHang']);

Route::get('filter', [\App\Http\Controllers\Client\FilterController::class, 'filter']);

Route::get('quickView', [\App\Http\Controllers\Client\ProductController::class, 'quick']);
