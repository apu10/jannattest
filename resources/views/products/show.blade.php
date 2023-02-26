@extends('layouts.app')
@section('content')
@if(session('success'))
    <h1>{{session('success')}}</h1>
@endif
@empty ($products)
    <div class="alert alert-worning">
        The List of products is empty
    </div>
@else
    <div class="row">
        @foreach ($products as $product)
            <div class="col-3">
                @include('components.product-cart');
            </div>
        @endforeach
    </div>
@endif


@endsection
