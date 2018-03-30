@extends('layouts.app')

@section('title','Home')

@section('content')
@foreach($products as $product)
<form method="POST" action="{{ route('cart.add',$product->id) }}">
@csrf
{{ $product->name }} - RM {{ $product->price }}
<button>Add</button>
</form>
@endforeach
@endsection
