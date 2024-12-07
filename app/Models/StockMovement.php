<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'variant_id', 'quantity', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}