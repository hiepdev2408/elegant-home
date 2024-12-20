<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

     function attributes(){
        return $this->hasMany(VariantAttribute::class);
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
