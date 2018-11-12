<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = 'City';

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    public function transport()
    {
        return $this->hasMany(TransportRouteNumbers::class);
    }
}
