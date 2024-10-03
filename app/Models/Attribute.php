<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'variant_id',
        'name',
    ];

    public function variant(){
        return $this->belongsTo(Variant::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
