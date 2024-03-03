<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function show_cart(Request $request)
    {
        $result = Category::get();
        $prods = Product::get();
        return view('cart.cart', compact('result', 'prods'));
    }

    public function add_to_cart($id)
    {
        $product = Product::find($id);
        Cart::add($product, 1 )->associate(Product::class);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {

        Cart::update($request->rowId, $request->quantity);
        return redirect()->back();
    }


    public function clear_cart()
    {
        Cart::destroy();
        return redirect()->back();
    }

    public function delete_ietm_Cart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    // #################################################

    public function checkout_order(Request $request)
    {
        $result = Category::get();
        $prods = Product::get();
        return view('cart.checkout', compact('result', 'prods'));
    }


}
