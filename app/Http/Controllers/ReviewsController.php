<?php

namespace App\Http\Controllers;

use App\City;
use App\Events\SaveReview;
use App\Exports\ReviewsExport;
use App\Facades\CSVServiceFacade;
use App\Photo;
use App\PhotoReview;
use App\Reviews;
use App\services\GoogleCloudeVisionService;
use App\services\PythonScriptExec;
use App\TransportProblems;
use App\TransportRouteNumbers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\Exception;

class ReviewsController extends Controller
{
    CONST LIMIT = 20;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveReview(Request $r)
    {
        /*$this->validate($r,[
           'city' => 'required',
           'problem' => 'required',
           ''
        ]);*/
        $res = null;
        if($file = $r->file('car')) {
            $file->move(public_path('cars'), $r->file('car')->getClientOriginalName());
            $image_path = $r->file('car')->getClientOriginalName();
            $res = PythonScriptExec::exec(PythonScriptExec::DECTED_PLATES, ['img' => $image_path]);
        }
        if(!$number = $r->transport) {
            $number = trim($this->recognizeNumber());
        }
        $car = TransportRouteNumbers::where(['carNumber' => $number])->first();
        $transport_id = $car->id;
        $user_id = Auth::user()->id;
        $city_id = $r->city;
        $problem_id = $r->problem;
        $date = Carbon::now();
        $currentDate = $date->toDateString();
        $currentTime = $date->toTimeString();
        $location = $r->location;
        $text = $r->textReview;
        $review = new Reviews();
        $lat = $r->lat;
        $lng = $r->lng;
        $review->setData($user_id, $city_id, $problem_id, $transport_id, $currentDate, $currentTime, $location, $text, $lat, $lng);
        $review->save();
        SaveReview::fire($review);
        $photos = $r->violation;
        foreach($photos as $photo) {
            $photo = Photo::create(['path' => $photo->getClientOriginalName()]);
            PhotoReview::create(['reviews_id' => $review->id, 'photo_id' => $photo->id]);
        }
    }

    public function getMarker(Request $r)
    {
        $page = $r->p > 1 ? $r->p : 0;
        $from = static::LIMIT * $page;
        $reviews = Reviews::offset($from)->limit(static::LIMIT)->get();
        $dataMarker = [];
        foreach($reviews as $review) {
            if($review->lat != 0 && $review->lng != 0) {
                $dataMarker[] = [
                    'location' => ['lat' => $review->lat, 'lng' => $review->lng],
                    'images' => URL::to('/') . '/image/' . $review->photo[0]->path
                ];
            }
        }
        return json_encode($dataMarker);
    }

    public function recognizeNumber() {
        $vision = new GoogleCloudeVisionService();
        return $vision->recognizeText('C:\Program Files\OSPanel\domains\Urban-transport-reviewer\public\cars\crops\cropped.jpg');
    }

    public function showReview()
    {
        $reviews = Reviews::paginate(static::LIMIT);
        return view('show-reviews', ['reviews' => $reviews]);
        //$vision = new GoogleCloudeVisionService();
        //$res = $vision->recognizeText('C:\Program Files\OSPanel\domains\Urban-transport-reviewer\public\cars\crops\cropped.jpg');
        /*$reviews = CSVServiceFacade::getReviews();
        foreach ($reviews as $review) {
            echo $review->location;
        }*/
        ///$reviews = Reviews::all();

       //var_dump($reviews[1]->transport->carrier->carrierName);
        //Excel::store(new ReviewsExport(), 'review.csv');
        //return Excel::download(new ReviewsExport(), 'test.csv');


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

    public function allReviewGraphic()
    {
        $res = PythonScriptExec::exec(PythonScriptExec::GRAPHIC);
        var_dump($res);
    }

    public function reviewGraphicByDate(Request $r)
    {
        $data['dateStart'] = '2018-11-01';
        $data['dateEnd'] = '2018-12-12';
        $data['type'] = 'date';
        $res = PythonScriptExec::exec(PythonScriptExec::GRAPHIC, $data);
        var_dump($res);
    }

}
