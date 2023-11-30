<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->get();
        return view('screens.user.shop', compact('products'));
    }

    function sidebar(){
        $products = Product::all();
        return view('screens.user.shop-sidebar',compact('products'));
    }
    function checkout(){
        return view('screens.user.checkout');
    }
    function cart(){
        return view('screens.user.cart');
    }
    function show(Product $product) {
        $product = $product->with('attributes','variants')->find($product->id);
        // dd($product);
        return view('screens.user.product-single',compact('product'));
    }
}
