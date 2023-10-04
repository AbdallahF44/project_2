<?php

namespace App\Models;

use App\Models\Image;
use App\Models\SubCategory;
use App\Models\OrderProduct;
use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class);
    }
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'object');
    }
}
