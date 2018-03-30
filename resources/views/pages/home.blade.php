@extends('layouts.app')

@section('content')

<h1>Products</h1>

@forelse($products as $product)
    <div>
        <strong>{{ $product->name }}</strong><br>
        RM {{ number_format($product->price, 2) }}

        <form method="POST" action="{{ route('cart.add', $product->id) }}">
            @csrf
            <button type="submit">Add to Cart</button>
        </form>
    </div>
@empty
    <p>No products found.</p>
@endforelse

@endsection
