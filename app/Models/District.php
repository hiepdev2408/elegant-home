<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];

    protected $table = 'districts';

    protected $primaryKey = 'code';

    public $incrementing = 'fales';

    public function wards(){
        return $this->hasMany(Ward::class, 'district_code', 'code');
    }

    public function province(){
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function users(){
        return $this->hasMany(User::class, 'district_id', 'code');
    }
}
