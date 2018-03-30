<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cart
    ) {}

    public function add(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $this->cart->add($product);

        return redirect()->route('cart');
    }

    public function index(): View
    {
        return view('pages.cart', [
            'cart' => $this->cart->items(),
        ]);
    }
}
