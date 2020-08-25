<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        $carts = Session::get('cart');

        return view('mainHome',compact('products','carts'));
    }

    public function checkout()
    {
        return view('checkout');
    }
//    public function addToCart($id)
//    {
//
//        $product = $this->productService->findById($id);
//        $cart = Cart::add(array('id'=>$product->id, 'name'=>$product->name, 'qty'=>1,'price'=>$product->price,'weight'=>0));
//        $carts=[];
//        array_push($carts,$cart);
//        return view('cart.index',compact('carts'));
//    }

    public function viewProduct($id)
    {
        $product = $this->productService->findById($id);
        $carts = Session::get('cart');
        return view('product',compact('product','carts'));
    }
}
