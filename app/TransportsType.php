<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportsType extends Model
{
    public $table = 'TransportsType';

    public function reviews()
    {
        return $this->belongsTo(Reviews::class);
    }
}
