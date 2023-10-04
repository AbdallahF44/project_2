<?php

namespace App\Models;

use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'status'];
    public function getVisiblitiyAttribute()
    {
        return $this->status ? 'Visible' : 'Hidden';
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'object');
    }
}
