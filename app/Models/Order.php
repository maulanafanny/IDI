<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quantity',
        'total',
        'seat',
        'code',
        'customer_id'
    ];

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    function addTotal($price)
    {
        $total = Order::first()->total + $price;

        Order::first()->update(['total' => $total]);
    }
}
