<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportProblems extends Model
{
    public $table = 'TransportProblems';

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
}
