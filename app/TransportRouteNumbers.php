<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportRouteNumbers extends Model
{
    public $timestamps = false;
    public $table = 'TransportRouteNumbers';
    public $fillable = ['routeNumber', 'route', 'carNumber', 'carrier_id', 'city_id'];
}
