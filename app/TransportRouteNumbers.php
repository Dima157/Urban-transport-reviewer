<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportRouteNumbers extends Model
{
    public $timestamps = false;
    public $table = 'TransportRouteNumbers';
    public $fillable = ['routeNumber', 'route', 'carNumber', 'carrier_id', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
}
