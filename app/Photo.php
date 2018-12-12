<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $table = 'photo';
    public $fillable = ['path'];

    public function reviews()
    {
        return $this->belongsToMany(Reviews::class);
    }
}
