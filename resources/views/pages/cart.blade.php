@extends('layouts.app')

@section('title','Cart')

@section('content')
@foreach($products as $product)
{{ $product->name }} ({{ $cart[$product->id]['qty'] }})
@endforeach
<a href="{{ route('checkout') }}">Checkout</a>
@endsection
