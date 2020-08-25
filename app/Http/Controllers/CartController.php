<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Customer;
use App\Detail;
use App\Product;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart($idProduct)
    {

        $product = $this->product->findOrFail($idProduct);

        $oldCart = Session::get('cart');

        $newCart = new \App\Cart($oldCart);
        $newCart->add($product);

        Session::put('cart', $newCart);
        toastr()->success('Update ShoppingCart Success!', 'Success');
        return back();
    }

    public function index()
    {
        $carts = Session::get('cart');

        return view('cart.index', compact('carts'));
    }



    public function update(Request $request, $id)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->update($request, $id);
                Session::put('cart', $cart);
                $message = 'Update ShoppingCart Success!';
            } else {
                $message = 'No product in your cart!';
            }
        } else {
            $message = 'No product in your cart!';
        }

        $data = [
            'productUpdate' => Session::get('cart')->items[$id],
            'message' => $message,
            'totalPriceCart' => Session::get('cart')->totalPrice
        ];

        return response()->json($data);
    }

    public function checkOut()
    {
        $carts = Session::get('cart');

        return view('checkout', compact('carts'));
    }

    public function placeOder(Request $request)
    {
        $carts = Session::get('cart');
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        $bill = new Bill();
        $bill->totalPrice = $carts->totalPrice;
        $bill->note = $request->note;
        $bill->status = 'Đang xử ';
        $bill->customer_id = $customer->id;
        $bill->save();

        foreach ($carts->items as $key => $product) {
            $details = new Detail();
            $details->bill_id=$bill->id;
            $details->product_id=$key;
            $details->qtyOrder=$product['totalQty'];
            $detail[$key] = $details->save();
        }

        toastr()->success('Đơn hàng của bạn đang được xử lý ');

        Session::forget('cart');
        return redirect()->route('shop.index');
    }
}
