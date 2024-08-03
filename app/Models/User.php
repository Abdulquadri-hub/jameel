<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'firstname',
        'lastname',
        'email',
        'country',
        'state',
        'city',
        'postal_code',
        'password',
        'terms',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function getFulnameAttribute()
    // {
    //     if(Auth::user())
    //     {
    //         return Auth::user()->firstname . " " . Auth::user()->lastname;
    //     }
    // }

    public function brand()
    {
        return $this->HasMany(Brand::class);
    }

    public function category()
    {
        return $this->HasMany(Categories::class);
    }

    public function product()
    {
        return $this->HasMany(Product::class);
    }
}
