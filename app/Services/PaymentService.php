<?php

namespace App\Services;

use App\Models\Order;

class PaymentService
{
    public function createPayment(Order $order): string
    {
        // Placeholder URL (Billplz / ToyyibPay redirect)
        return route('payment.callback', $order->order_no);
    }

    public function markPaid(Order $order, string $ref): void
    {
        $order->update([
            'payment_provider' => 'billplz',
            'payment_ref'      => $ref,
            'payment_status'   => 'paid',
            'status'           => 'paid',
        ]);
    }
}
