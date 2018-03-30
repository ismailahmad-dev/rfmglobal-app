@extends('layouts.app')

@section('title', 'Order Success')

@section('content')

<h1>Thank you for your order!</h1>

<p>
    <strong>Order No:</strong> {{ $order->order_no }}
</p>

<table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
    @foreach($order->items as $item)
        <tr>
            <td>{{ $item->product_id }}</td>
            <td>{{ $item->quantity }}</td>
            <td>RM {{ number_format($item->price, 2) }}</td>
            <td>
                RM {{ number_format($item->price * $item->quantity, 2) }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<p>
    <strong>Total:</strong>
    RM {{ number_format($order->total, 2) }}
</p>

<a href="{{ route('payment.pay', $order->order_no) }}">
    Pay Now
</a>

@endsection
