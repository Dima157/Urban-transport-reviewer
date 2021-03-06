<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    public $timestamps = false;
    public $table = 'Carrier';
    public $fillable = ['carrierName', 'carrierSurname', 'carrierPhoneNumber'];

    public function transport()
    {
        return $this->hasMany(TransportRouteNumbers::class);
    }
}
