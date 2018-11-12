<?php

use Faker\Generator as Faker;

$factory->define(\App\Reviews::class, function (Faker $faker) {
    $date = generateDate();
    $time = generateTime();
    $transport = getTransport();
    return [
        'user_id' => rand(1, 1382),
        'city_id' => 6,
        'problem_id' => rand(1, 5),
        'transport_id' => $transport,
        'dateReview' => $date,
        'timeReview' => $time,
        'location' => getStreet()
    ];
});

function getTransport()
{
    $transportIds = [30, 38, 68, 105, 118, 119, 125, 126, 127, 129, 130, 131, 132, 134, 138, 139, 140];
    $id = rand(0, 16);
    return $transportIds[$id];
}

function generateDate()
{
    $year = 2018;
    $months = [8, 9, 10, 11];
    $month = $months[rand(0, 3)];
    $day = rand(1, 30);
    return $year . '-' . $month . '-' . $day;
}

function generateTime()
{
    return rand(8, 21) . ':' . rand(1, 59) . ':' . rand(1, 59);
}

function getStreet()
{
    $streets = [
        'May 1, Street',
        'March 8 Welsh',
        'St. Andrew\'s Street',
        'Andreevsky 1 Pro.',
        'Andreevsky P-D Andrew\'s Proven.',
        'Antonovicha Vul.',
        'Artelny Prov.',
        'Baika Street',
        'Balzacovskaya Street',
        'Baranovsky Proven.',
        'Baranova Street',
        'Barashivka',
        'Barashivska Street',
        'Dombrowski Street',
        'Friendship 1 Prov.',
        'Friendship Street.',
        'Dubovets Zhitny 1 Pro.',
        'Zhitnaya 2 Prov.',
        'Zhytnya Market Street',
        'Georgian Prov.',
        'Ruukka Street',
        'Zhukova Street',
        'Положщик Поліська Вул.',
        'Polissky P-D Field Field.',
        'Field Fields',
        'Field 2 Prov.',
        'Field 3 Prov.',
        'Field 5 Prov.',
        'Field 6 Prov.',
        'Polish BP Vul.',
        'Popova Pro',
        'Potapova Street',
        'Coastal Street',
    ];
    $index = rand(1, 30);
    return $streets[$index];
}