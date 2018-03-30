<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(
        protected OrderRepositoryInterface $orders,
        protected CartService $cart
    ) {}

    public function create(array $data): Order
    {
        $order = $this->orders->create([
            'order_no'      => Str::uuid(),
            'customer_name' => $data['name'],
            'email'         => $data['email'],
            'phone'         => $data['phone'],
            'address'       => $data['address'],
            'total'         => $this->cart->total(),
            'status'        => 'pending',
        ]);

        $this->cart->clear();

        return $order;
    }
}
