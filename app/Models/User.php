<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Favourite;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'avatar',
        'province_id',
        'district_id',
        'ward_id',
        'address',
        'point',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function province(){
        return $this->belongsTo(Province::class, 'province_id', 'code');
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'code');
    }

    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id', 'code');
    }

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function cartDetails(){
        return $this->hasMany(CartDetail::class);
    }

    // public function isAdmin()
    // {
    //     return $this->type == self::TYPE_ADMIN;
    // }
    // public function isMember()
    // {
    //     return $this->type == self::TYPE_MEMBER;
    // }
    public function favorites() {
        return $this->hasMany(Favourite::class, 'user_id','id');
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
