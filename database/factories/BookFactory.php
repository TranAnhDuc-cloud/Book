<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->text(100),
        'author'=>$faker->text(100),
        'description'=>$faker->text(100),
        'image'=>$faker->text(100),
        'available'=>$faker->boolean(),
        'ISBN'=>$faker->text(100),
    ];
});
