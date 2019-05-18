<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Userinfo::class, function (Faker $faker) {
    return [

        'company_name' => $faker->company,
        'title' => $faker->title,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'country' => $faker->country,
        'state' => $faker->countryCode,
        'city' => $faker->city,
        'delivery_address_1' => $faker->address,
        'delivery_address_2' => $faker->address,
        'zip' => $faker->postcode,
        'telephone' => $faker->phoneNumber,
        'business_type' => $faker->companySuffix,
        'hear_about_us' => $faker->randomElement(array('from friend', 'from ad', 'from search engine')),
        'comments' => $faker->sentence,
        'language' => $faker->languageCode,
        'website' => $faker->domainName,
        'fax' => $faker->buildingNumber,
        'isSeller' => 1,
        'isBuyer' => 0,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
        'status' => 1,
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        }
    ];
});
