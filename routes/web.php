<?php

use App\Http\Controllers\Admin\DasboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/','screens.user.index')->name('index');


// Route::get('/shop', function(){
//     return view('screens.user.shop');
// })->name('shop');
//auth routes
Route::group(['middleware'=> 'guest'],function(){
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('regiter');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

});


Route::group(['middleware'=>'auth'],function(){
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
    Route::get('/shop',[ProductController::class,'index'])->name('shop');
    Route::get('/shop-sidebar',[ProductController::class,'sidebar'])->name('sidebar');
    Route::get('/product-details/{product}',[ProductController::class,'show'])->name('product.details');
    Route::get('/checkout',[ProductController::class,'checkout'])->name('checkout');
    Route::get('/cart',[ProductController::class,'cart'])->name('cart');

    // cart

    Route::post('/add/cart/{product}',[CartController::class,'addToCart'])->name('cart.add');
});

//admin routes

Route::get('/product-upload',[AdminProductController::class,'create'])->name('product.create');
// Route::view('/product-upload','screens.admin.productUpload')->name('product.create');

Route::post('/store',[AdminProductController::class,'store'])->name('product.store');


// Admin routes

Route::get('/admin/index',[DasboardController::class,'index'])->name('admin.index');
Route::get('/admin/products-management',[DasboardController::class,'products'])->name('admin.products.management');

Route::get('/admin/variants/create',[VariantController::class,'create'])->name('admin.products.variants.create');
Route::post('/admin/variants/store',[VariantController::class,'store'])->name('admin.products.variants.store');
