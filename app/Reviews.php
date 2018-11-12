<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public $timestamps = false;
    public $table = 'Reviews';
    public $fillable = ['user_id', 'city_id', 'problem_id', 'transport_id', 'dataReview'];

    public function __construct($user_id, $city_id, $problem_id, $transport_id, $dateReview, $timeReview, $location, array $attributes = [])
    {
        parent::__construct($attributes);
        $this->user_id = $user_id;
        $this->city_id = $city_id;
        $this->problem_id = $problem_id;
        $this->transport_id = $transport_id;
        $this->dateReview = $dateReview;
        $this->timeReview = $timeReview;
        $this->location = $location;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function problem()
    {
        return $this->belongsTo(TransportProblems::class);
    }

    public function transport()
    {
        return $this->belongsTo(TransportRouteNumbers::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
