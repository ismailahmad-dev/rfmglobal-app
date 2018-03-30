<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\PaymentService;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    public function pay(string $order_no, PaymentService $payment): RedirectResponse
    {
        $order = Order::where('order_no', $order_no)->firstOrFail();

        return redirect($payment->createPayment($order));
    }

    public function callback(string $order_no, PaymentService $payment): RedirectResponse
    {
        $order = Order::where('order_no', $order_no)->firstOrFail();

        $payment->markPaid($order, uniqid('PAY-'));

        return redirect()->route('success', $order->order_no);
    }
}
