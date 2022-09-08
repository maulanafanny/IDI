<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'quantity',
        'total',
        'seat',
        'code',
    ];

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    function addTotal($price)
    {
        $total = Order::where('id', Session::get('customer')['order_id'])->first()->total + $price;

        Order::where('id', Session::get('customer')['order_id'])->first()->update(['total' => $total]);
    }
}
