<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
    ];
    /**
     * Get all of the products for the Spice
     *
     * @return \Illuminate\DatProductloquent\Respice_idMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
