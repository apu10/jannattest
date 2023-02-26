<?php

namespace App\Models;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Get the payment that owns the Order
     *
     * @return \Illuminate\DatabPaymentEloquent\Relations\BelongsTo
     */
    protected $fillable = [
        'status',
        'customer_id',


    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }


    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id','id');
    }
    /**
     * The products that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }
    public function getTotalAttribute()
    {
        return $this->products->pluck('total')->sum();
    }
}
