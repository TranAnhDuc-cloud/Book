<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\BookRecord;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\BookRecord::class, function (Faker $faker) {
    return [
        //
        'user_id'=>User::all()->random()->id,
        'book_id'=>Book::all()->random()->id,
        'took_on'=>$faker->date(),
        'returned_on'=>$faker->date(),
        'due_date'=>$faker->date(),
    ];
});
