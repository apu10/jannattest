<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderPaymentController extends Controller
{
   public $cartService;
   public function __construct(CartService $cartService)
   {
    $this->cartService = $cartService;
    $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        //
        return view('payments.create')->with([
            'order' => $order,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        //
        //PaymentService::handlePayment()
        return DB::transaction(function () use ($request, $order){
        $this->cartService->getFromCookie()->products()->detach();

        $order->payment()->create([
            'amount'=>$order->total,
            'payed_at' =>now(),
        ]);
        $order->status = 'payed';
        $order->save();
        return redirect()
            ->route('index')
            ->withSuccess("Thank! we received your \${$order->total} payment.");
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Payment $payment)
    {
        //
    }
}
