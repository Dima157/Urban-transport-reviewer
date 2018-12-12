<?php

namespace App\Http\Controllers;

use App\services\GeoLocationService;
use Illuminate\Http\Request;
use GeoIp2\Database\Reader;

class GeoLocationController extends Controller
{
    public function getLocation()
    {
        $city_db = public_path() . '/GeoLite2-City.mmdb';
        $service = new GeoLocationService(new Reader($city_db));
        return $service->getLocationByIp($_SERVER['REMOTE_ADDR']);
    }
}
