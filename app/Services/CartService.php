<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function add(Product $product): void
    {
        $cart = session()->get('cart', []);

        $cart[$product->id] = [
            'product_id' => $product->id,
            'name'       => $product->name,
            'price'      => $product->price,
            'qty'        => ($cart[$product->id]['qty'] ?? 0) + 1,
        ];

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
