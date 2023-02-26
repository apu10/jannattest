@extends('layouts.app')
@section('content')
    <h1>Payments Details</h1>
    <h4 class="">Total Product = <strong>{{$order->total}}
    <form class="d-inline" method="POST" action="{{route('orders.payments.store',['order'=>$order->id])}}">
    @csrf
        <button type="submit">Pay   </button>
    </form>
    <div class="table-responsive">
                <div>

                </div>
        </table>
    </div>

@endsection
