<?php

use App\Models\Auth\User;

class DataSeeder extends BaseSeeder
{
    protected $usersCount = 10;

    public function run()
    {
        $users = $this->factory->of(User::class)
                                ->times($this->usersCount)
                                ->create();

        // $users->random($this->usersCount * 0.75)->each(function ($user) use ($tags) {
        //     $this->factory->of(Article::class)->times(rand(1, 5))->create([
        //         'user_id' => $user->id,
        //     ])->each(function (Article $article) use ($tags) {
        //         $article->tags()->sync($tags->random()->pluck('id')->toArray());
        //     });
        // });
    }
}
