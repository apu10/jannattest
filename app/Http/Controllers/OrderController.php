<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $carts = $this->cartService->getFromCookie();
        if(! isset($carts) ||  $carts->products->isEmpty()){
            return redirect()
                ->back()
                ->withErrors('Your Cart is Empty');
        }


        return view('orders.create')->with([
            'carts' =>$carts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return DB::transaction(function () {
            $user = Auth::user();
            // $user = $request->user();
            $order= $user->orders()->create([
                'status'=>'pending',
            ]);
            $cart = $this->cartService->getFromCookie();

            $cartProductsWithQuantity = $cart
                ->products
                ->mapWithKeys(function($product){
                    $element[$product->id] = ['quantity'=>$product->pivot->quantity];
                    return $element;
                });

            $order->products()->attach($cartProductsWithQuantity->toArray());
            //dd(route('orders.payments.create',['order'=>$order->id]));
            return redirect()->route('orders.payments.create',['order'=>$order->id]);
        },5);


    }




}
