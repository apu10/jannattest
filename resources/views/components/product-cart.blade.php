
<div style="float: left;border:1px solid black; margin:10px;padding:10px">

<h1>{{$product->title}} ({{$product->id}})</h1>
<p>{{$product->description}}</p>
<p>{{$product->price}}</p>
<p>{{$product->stock}}
    @if(isset($cart))
    <form method="POST" action="{{route('products.carts.destroy',['product'=>$product->id,'cart'=>$cart->id])}}">
        @csrf
        @method('DELETE')
        <input type="submit" value="delete">
        @inject('cartService','App\Services\CartService' )
        <br>Quantity: {{$product->pivot->quantity}}
    </form>
@else
<form method="POST" action="{{route('products.carts.store',['product'=>$product->id])}}">
    @csrf
    <input type="submit" value="Add to Cart">
</form>

@endif
</div>
