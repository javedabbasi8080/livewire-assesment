<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'orderNumber'; // Set the custom primary key column name
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'orderNumber', 'orderNumber');
    }

    public function getTotalAmountAttribute()
    {
        return $this->orderDetails->sum(function ($detail) {
            return $detail->priceEach * $detail->quantityOrdered;
        });
    }
}
