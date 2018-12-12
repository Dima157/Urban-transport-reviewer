<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.12.2018
 * Time: 1:12
 */

namespace App\services;


class GeoLocationService
{
    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    private function setIp($ip) {
        if(empty($ip)) {
            return false;
        }
        return $this->service->city($ip);
    }

    public function getLocationByIp($ip)
    {
        if($record = $this->setIp($ip)) {
            $location = [
                'lat' => $record->location->latitude,
                'lng' => $record->location->longitude
            ];
            return $location;
        }
        return false;
    }
}