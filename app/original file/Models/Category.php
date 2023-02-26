<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
    ];
    /**
     * Get all of the products for the Category
     *
     * @return \Illuminate\DatabProductquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
