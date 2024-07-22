<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'bid',
        'user_id',
        'brand',
        'brand_slug',
        'brand_status' 
    ];

    // public function user()
    // {
    //     return 
    // }
}
