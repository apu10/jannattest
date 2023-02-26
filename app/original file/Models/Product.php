<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'spice_id',
        'category_id',
        'title',
        'description',
        'price',
        'stock',
        'status',

    ];
    /**
     * Get the categories that owns the Product
     *
     * @return \Illuminate\Categorybase\Eloqucategory_idns\Bid     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spice()
    {
        return $this->belongsTo(Spice::class);
    }
    public function carts(){
        return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
    }

    public function orders()
    {
        return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }

    public function images()
    {
        return $this->morphMany(Image::class,'Imageable');
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function getTotalAttribute()
    {
        return $this->price * $this->pivot->quantity;
    }
}
