<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class CartController extends Controller
{
    public function add($id)
    {
        $cart = session()->get('cart', []);
        $cart[$id]['qty'] = ($cart[$id]['qty'] ?? 0) + 1;
        session(['cart' => $cart]);

        return redirect()->route('cart');
    }

    public function index()
    {
        $cart = session('cart', []);
        $products = Product::findMany(array_keys($cart));
        return view('pages.cart', compact('products','cart'));
    }
}
