<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(ShipCity::class, 'city_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(ShipDistrict::class, 'district_id', 'id');
    }

    public function ward()
    {
        return $this->belongsTo(ShipWards::class, 'ward_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
