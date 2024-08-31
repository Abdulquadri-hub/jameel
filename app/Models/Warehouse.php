<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "user_id",
        "wid",
        "warehouse",
        "location",
        "warehouse_status"
    ];

    public function getCreatedByAttribute()
    {
        return $this->user->firstname . ' ' . $this->user->lastname;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
