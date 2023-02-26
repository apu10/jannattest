<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'county',
        'country',
        'post_code',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_address');
    }
}
