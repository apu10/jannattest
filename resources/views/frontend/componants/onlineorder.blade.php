@extends('frontend.index')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-3">

        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">

              <div class="list-group list-group-flush mx-3 mt-4">
                @foreach ($categories as $category )
                <a
                href="#{{$category->title}}"
                class="list-group-item list-group-item-action py-2 ripple"
                aria-current="true"
              >
                {{$category->title}}
                </a>
                @endforeach

              </div>
            </div>
          </nav>
      </div>
      <div class="col-md-6" style="margin-top: 10px">

            <ol class="list-group list-group-light list-group-numbered">
                @foreach ($categories as $category )
                        <h4 id="{{$category->title}}">{{$category->title}}</h4>
                    @foreach($category->products as $product)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{$product->title}}  {{$product->spice->name}}</div>
                            {{$product->description}}
                        </div>
                        <span class="badge badge-primary rounded-pill">£ {{$product->price}}</span>
                    </li>
                    <button class="showCart{{$product->id}}" data-id="{{$product->id}}" onClick="addToCart({{$product->id}})" >Add to Cart</button>
                    <a href="" data-id="{{$product->id}}" id="showCart" >Add to Cart</a>
                    {{-- <form method="POST" action="{{route('addproductoncart',['product'=>$product->id])}}">
                        @csrf
                        <input type="submit" value="Add to Cart">
                    </form> --}}
                    @endforeach

                @endforeach

            </ol>
      </div>
      <div class="col-md-3" id="showCart2">

        <strong>Cart</strong>
        <div id="dd">
        </div>
      </div>


    </div>
  </div>

    <script language="javascript">
        function getInnterHTML(){
            var innerHTMLofId= document.getElementById('dd').innerHTML;
            return innerHTMLofId;
        }
        function addToCart(clicked){
            var deliveryCharge =10;
            var selectedOrderPolicy='delivery';
            var del_ch_min_ord_msg_HTML = '<ul class="list-unstyled">' +
                '<li>' +
                '<div class="row">' +
                '<div class="col-md-8">' +
                '<p>Delivery Charge : </p>' +
                '</div>' +
                '<div class="col-md-4 text-right" id="delCharge">&pound; ' + deliveryCharge + '</div>' +
                '</div>' +
                '</li>' +
                '<li>' +
                '<div class="row">' +
                '<div class="col-md-8">' +
                '<p>' + selectedOrderPolicy + ' Minimum : </p>' +
                '</div>' +
                '<div class="col-md-4 text-right" id="minDelMsg">0</div>' +
                '</div>' +
                '</li>' +
                '</ul>';
            //document.getElementById('dd').innerHTML = del_ch_min_ord_msg_HTML;
            document.getElementById('dd').innerHTML = getInnterHTML();
        }


    </script>

@endsection
