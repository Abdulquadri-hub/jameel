<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

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

    public function getCreatedByAttribute()
    {
        return $this->user->firstname . ' ' . $this->user->lastname;
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function product()
    {
        return $this->HasMany(Product::class);
    }
}
