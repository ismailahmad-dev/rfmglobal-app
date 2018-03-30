<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(
        protected OrderService $orders
    ) {}

    public function index(): View
    {
        return view('pages.checkout');
    }

    public function store(StoreCheckoutRequest $request): RedirectResponse
    {
        $order = $this->orders->create($request->validated());

        return redirect()->route('success', $order->order_no);
    }
    
    public function success(string $order_no): View
    {
        $order = Order::where('order_no', $order_no)->with('items')->firstOrFail();

        return view('pages.success', compact('order'));
    }
}
