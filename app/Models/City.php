<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
