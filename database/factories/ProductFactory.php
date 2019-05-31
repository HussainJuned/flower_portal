<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    $price_p_s = $faker->randomFloat(4, 0.01, 20);
    $pack_tf = $faker->boolean();
    $pack = 'Stem';
    $no_stem = 1;
    if($pack_tf) {
        $pack = 'Bunch';
        $no_stem = $faker->numberBetween(2, 100);
    }
    $total = $price_p_s * $no_stem;
    $cat = \App\Category::all();

    $colourPalate = array('#FFC813', '#FE7418', '#FFB27E', '#B90000', '#E496C4', '#2F2074', '#95AB46', '#914423',
        '#181417', '#E8E2DF', '#D4AF37', '#C0C0C0', 'mix');

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'price_per_stem_bunch' => $price_p_s,
        'number_of_stem' => $no_stem,
        'price' => $total,
        'pack' => $pack,
        'height' => $faker->numberBetween(1, 20) . ' cm',
        'origin' => $faker->country,
        'colour' => $faker->randomElement($colourPalate),
        'category' => $faker->randomElement($cat),
        'available_date_start' => \Carbon\Carbon::now()->addDays(1),
        'available_date_end' => \Carbon\Carbon::now()->addDays($faker->numberBetween(2, 25)),
        'status' => $faker->boolean(),
        'photo_url' => 'uploads/default.png',
        'stock' => $faker->numberBetween(1, 100),
        's_increment' => $faker->randomElement(array(5, 10, 20, 50)),
        'feature' => $faker->numberBetween(0, 4),
        'grower' => $faker->name
    ];
});
