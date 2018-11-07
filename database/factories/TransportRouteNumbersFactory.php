<?php

use Faker\Generator as Faker;

$factory->define(\App\TransportRouteNumbers::class, function (Faker $faker) {
    $type = 1;
    $routeNumber = $type == 3 ? rand(1, 10) : rand(1, 15);
    $carNumber = "AA" . rand(1,9) . rand(1,9) . rand(1,9) . rand(1,9);
    $carrier = rand(1,8);
    $city = 6;
    return [
        'routeNumber' => $routeNumber,
        'route' => '',
        'carNumber' => $carNumber,
        'carrier_id' => $carrier,
        'city_id' => $city,
        'type_id' => $type
    ];
});
