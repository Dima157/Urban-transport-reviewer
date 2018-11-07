<?php

namespace App\Http\Controllers;

use App\Facades\CSVServiceFacade;
use App\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function showReview()
    {
        /*$reviews = CSVServiceFacade::getReviews();
        foreach ($reviews as $review) {
            echo $review->location;
        }*/

        $reviews = Reviews::find(1);
        var_dump($reviews->problem);
    }
}
