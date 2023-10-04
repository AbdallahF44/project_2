<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Address;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
