<?php

namespace App\Models;

use App\Models\City;
use App\Models\Image;
use App\Models\Order;
use App\Models\Address;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'object');
    }
}
