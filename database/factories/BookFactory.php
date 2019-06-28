<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Book;
use App\Category;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name'          => $faker->unique()->sentence(3, true),
        'author'        => $faker->unique()->name,
        'publish_date'  => $faker->dateTimeThisDecade('now', null),
        'category_id'   => Category::pluck('id')->random(),
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
    ];
});
