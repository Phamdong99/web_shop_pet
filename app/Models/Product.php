<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'price_sale',
        'active',
        'type',
        'thumb',
        'qty_product'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name'=>'']);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
    public function carts()
    {
        return $this->hasMany(CartDetail::class, 'product_id', 'id');
    }
}
