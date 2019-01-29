<?php

use App\Models\Discount;

$this->factory->define(Discount::class, function (\Faker\Generator $faker) {
    // return [
    //     'body' => $faker->sentences(rand(1, 5), true),
    //     'article_id' => function () {
    //         return $this->factory->of(Article::class)->create()->id;
    //     },
    //     'user_id' => function () {
    //         return $this->factory->of(User::class)->create()->id;
    //     },
    // ];
});

