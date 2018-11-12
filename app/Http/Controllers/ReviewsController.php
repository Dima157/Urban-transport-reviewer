<?php

namespace App\Http\Controllers;

use App\City;
use App\Exports\ReviewsExport;
use App\Facades\CSVServiceFacade;
use App\Reviews;
use App\TransportProblems;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\Exception;

class ReviewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveReview(Request $r)
    {
        $user_id = Auth::user()->id;
        $city_id = $r->city;
        $transport_id = $r->transport;
        $problem_id = $r->problem;
        $date = Carbon::now();
        $currentDate = $date->toDateString();
        $currentTime = $date->toTimeString();
        $review = new Reviews($user_id, $city_id, $problem_id, $transport_id, $currentDate, $currentTime, 'test location');
        $review->save();
    }

    public function showReview()
    {
        /*$reviews = CSVServiceFacade::getReviews();
        foreach ($reviews as $review) {
            echo $review->location;
        }*/
        $reviews = Reviews::all();

       //var_dump($reviews[1]->transport->carrier->carrierName);

        return Excel::download(new ReviewsExport(), 'test.csv');


        /*$reviews = Reviews::find(1);
        try{
            CSVServiceFacade::getCsvReviews($reviews);
        }catch (Exception $ex) {

        }*/
    }

    public function getDataReview()
    {
        $problems = TransportProblems::all();
        $cities = City::all();
        return view('send-review', ['problems' => $problems, 'cities' => $cities]);
    }
}
