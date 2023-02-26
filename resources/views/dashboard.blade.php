<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(isset($errors)&& $errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error )
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('success'))

                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>

                    @endif

                    @yield('content')



                    @isset(   $products)
                    @foreach ($products as $product )
                        <div class="card float-left">
                            <div class="card-body">
                            <h2>{{$product->id}}</h2>
                            <img src={{url($product->images[0]['path'])}} style="width:100px;">
                             <form class="d-inline" method="POST" action={{route('products.carts.store',['product'=>$product->id])}}>
                               @csrf
                                <button type="submit" > Add to Cart</button>

                             </form>
                            </div>
                        </div>
                    @endforeach
                @endisset

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

