@extends('layouts.app')
@section('content')
<h1>Your Cart</h1>
    @if(!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            The list of products is empty
        </div>
    @else
        <h1>Total Price is : <strong>{{$cart->total}}</h1>
        <div class="row">
            <a href="{{route('orders.create')}}"> start Order</a>

            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include('components.product-cart')
                </div>
            @endforeach
        </div>
    @endif
@endsection
