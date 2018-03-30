@extends('layouts.app')

@section('title','Checkout')

@section('content')
<form method="POST" action="{{ route('checkout.store') }}">
@csrf
<input name="name" required>
<input name="email" required>
<input name="phone" required>
<textarea name="address"></textarea>
<button>Pay</button>
</form>
@endsection
