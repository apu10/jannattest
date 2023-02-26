@extends('layouts.app')
@section('content')
    <h1>Order Details</h1>
    <h4 class="">Total Product = <strong>{{$carts->total}}
    <form class="d-inline" method="POST" action="{{route('orders.store')}}">
    @csrf
        <button type="submit">Confirm</button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped" style="border:1px solid black" >
            <thead class="thead-light">
                <th> Id</th>
                <th> Title</th>
                <th> Price</th>
                <th> qty</th>
                <th> total</th>
                <?php $total = 0?>
            </thead>
            <tbody>
                @foreach ($carts->products as $product )
                <tr>
                    <td>{{$product->id}}
                    <td> {{$product->title}}</td>
                    <td> {{$product->price}}</td>
                    <td> {{$product->pivot->quantity}}</td>
                    <td> {{ $product->total}}</td>
                    <?php $total = $total+ (float)((float) $product->pivot->quantity * (float)$product->price) ?>
                @endforeach
            </tbody>
                <div>
                    Total  = {{$total}}
                </div>
        </table>
    </div>

@endsection
