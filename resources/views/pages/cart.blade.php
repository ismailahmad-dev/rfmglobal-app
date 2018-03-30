@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<h1>Your Cart</h1>

@if(empty($cart))
    <p>Your cart is empty.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cart as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>RM {{ number_format($item['price'], 2) }}</td>
                <td>RM {{ number_format($item['qty'] * $item['price'], 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('checkout') }}">Proceed to Checkout</a>
@endif

@endsection
