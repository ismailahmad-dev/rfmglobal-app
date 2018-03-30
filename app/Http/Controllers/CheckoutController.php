<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Product;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('pages.checkout');
    }

    public function store(Request $request)
    {
        $total = 0;
        foreach (session('cart') as $item) {
            $total += $item['qty'] * Product::find($item)->price;
        }

        $order = Order::create([
            'order_no' => Str::uuid(),
            'customer_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total,
        ]);

        session()->forget('cart');

        return redirect()->route('success');
    }
}

