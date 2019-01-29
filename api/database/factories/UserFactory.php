<?php

use App\Models\Auth\User;

$this->factory->define(User::class, function () {
    return  [
        'name' => $this->faker->name,
        'surnames' => $this->faker->lastName,
        'email' => $this->faker->email,
        'username' => $this->faker->userName,
        'password' => password_hash($this->faker->password, PASSWORD_DEFAULT),
        'agency' => $this->faker->company,
        'acd' => $this->faker->numberBetween($min = 1, $max = 9999),
        'access_token' => $this->faker->sha256,
        'created_at' => $this->faker->dateTime(),
        'updated_at' => $this->faker->dateTime()
    ];
});

// $this->factory->define(Discount::class, function (\Faker\Generator $this->faker) {
//     return [
//         'body' => $this->faker->sentences(rand(1, 5), true),
//         'article_id' => function () {
//             return $this->factory->of(Article::class)->create()->id;
//         },
//         'user_id' => function () {
//             return $this->factory->of(User::class)->create()->id;
//         },
//     ];
// });


