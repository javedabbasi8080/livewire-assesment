<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'customerNumber'; // Set the custom primary key column name
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customerNumber', 'customerNumber'); // Specify the foreign key and local key
    }
}
