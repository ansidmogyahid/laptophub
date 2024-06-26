<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeByBrand($query, $brandId)
    {
        return $query->where('brand_id', $brandId);
    }
}
