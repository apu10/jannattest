<?php

namespace App\Models;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * Get the order associated with the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected $fillable = [
        'amount',
        'payed_at',
        'order_id',
    ];
    protected $dates = [
        'payed_at',
    ];
    public function carts(){
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }




}
