<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'cid',
        'user_id',
        'category_slug',
        'category_status' 
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
