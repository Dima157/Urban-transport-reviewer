<?php

namespace App\Http\Controllers;

use App\Reviews;
use App\TransportRouteNumbers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TransportController extends Controller
{
    public function getTransportsByCityId(Request $r) {
        $transports = TransportRouteNumbers::where('city_id', $r->city_id)->get();
        return json_encode($transports);
    }
}
