<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\BuyerAddress::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'country' => $faker->country,
        'state' => $faker->countryCode,
        'city' => $faker->city,
        'delivery_address_1' => $faker->address,
        'delivery_address_2' => $faker->address,
        'zip' => $faker->postcode,
        'suite' => $faker->word,
        'buzzer' => $faker->word,
    ];
});
