<?php

use Faker\Generator as Faker;

$factory->define(\App\Carrier::class, function (Faker $faker) {
    return [
        'carrierName' => $faker->name(),
        'carrierSurname' => $faker->lastName,
        'carrierPhoneNumber' => $faker->phoneNumber
    ];
});
