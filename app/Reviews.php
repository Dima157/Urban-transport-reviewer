<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public $timestamps = false;
    public $table = 'Reviews';
    public $fillable = ['user_id', 'city_id', 'problem_id', 'transport_id', 'dataReview'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function problem()
    {
        return $this->belongsTo(TransportProblems::class);
    }
}
