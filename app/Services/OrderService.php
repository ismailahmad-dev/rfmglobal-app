<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(
        protected OrderRepositoryInterface $orders,
        protected CartService $cart
    ) {}

    public function create(array $data): Order
    {
        return DB::transaction(function () use ($data) {

            $order = $this->orders->create([
                'order_no'      => Str::uuid(),
                'customer_name' => $data['name'],
                'email'         => $data['email'],
                'phone'         => $data['phone'],
                'address'       => $data['address'],
                'total'         => $this->cart->total(),
                'status'        => 'pending',
            ]);

            foreach ($this->cart->items() as $item) {
                $order->items()->create([
                    'product_id' => $item['product_id'],
                    'price'      => $item['price'],
                    'quantity'   => $item['qty'],
                ]);
            }

            $this->cart->clear();

            return $order;
        });
    }
}
