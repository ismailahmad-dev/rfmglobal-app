<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function add(Product $product): void
    {
        $cart = session()->get('cart', []);

        $cart[$product->id]['qty'] =
            ($cart[$product->id]['qty'] ?? 0) + 1;

        $cart[$product->id]['price'] = $product->price;
        $cart[$product->id]['name']  = $product->name;

        session(['cart' => $cart]);
    }

    public function items(): array
    {
        return session('cart', []);
    }

    public function clear(): void
    {
        session()->forget('cart');
    }

    public function total(): float
    {
        return collect($this->items())
            ->sum(fn ($i) => $i['qty'] * $i['price']);
    }
}
