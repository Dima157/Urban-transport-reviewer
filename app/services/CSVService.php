<?php

namespace App\services;

use App\Reviews;

class CSVService
{
    public function getReviews()
    {
        $allReviews = Reviews::all();
        return $allReviews;
    }
}