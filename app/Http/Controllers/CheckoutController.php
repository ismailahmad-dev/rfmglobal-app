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
        $this->orders->create($request->validated());

        return redirect()->route('success');
    }
}
