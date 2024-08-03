<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "pid",
        "product",
        "barcode",
        "views",
        "description",
        "product_slug",
        "product_status",
        "price",
        "quantity",
        "currency",
        "sku",
        "image1",
        "image2",
        "image3",
        "returnable",
        "category_id",
        "brand_id",
        "user_id"
    ];

    
    public function getCreatedByAttribute()
    {
        return $this->user->firstname . ' ' . $this->user->lastname;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
