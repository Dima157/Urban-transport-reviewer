<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoReview extends Model
{
    public $table = 'photo_reviews';
    public $fillable = ['reviews_id', 'photo_id'];
}
