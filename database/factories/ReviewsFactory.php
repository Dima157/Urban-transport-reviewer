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
        '1 Травня Вул.',
        '8 Березня Вул.',
        'Альбрехта Пров.',
        'Андріївська Вул.',
        'Андріївський 1 Пров.',
        'Андріївський П-Д Андріївський Пров.',
        'Антоновича Вул.',
        'Артельний Пров.',
        'Байка Вул.',
        'Бальзаківська Вул.',
        'Баранівський Пров.',
        'Баранова Вул.',
        'Барашівка',
        'Барашівська Вул.',
        'Домбровського Вул.',
        'Дружби 1 Пров.',
        'Дружби Вул.',
        'Дубовець Житній 1 Пров.',
        'Житній 2 Пров.',
        'Житній Ринок Вул.',
        'Жоржиновий Пров.',
        'Жуйка Вул.',
        'Жукова Вул.',
        'Покостівка Поліська Вул.',
        'Поліський П-Д Польова Пл.',
        'Польова Пров.',
        'Польовий 2 Пров.',
        'Польовий 3 Пров.',
        'Польовий 5 Пров.',
        'Польовий 6 Пров.',
        'Польський Б-Р Вул.',
        'Попова Пров. ',
        'Потапова Вул.',
        'Прибережна Вул.',
    ];
    $index = rand(1, 30);
    return $streets[$index];
}