<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'total',
        'active'
    ];


    public function cart_details()
    {
        return $this->hasMany(CartDetail::class, 'cart_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id', 'id');
    }
}
