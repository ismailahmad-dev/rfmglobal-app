<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_no','customer_name','email','phone','address','total','status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
