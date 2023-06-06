<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Post::factory(30)->create();

        // 15userがランダムで2〜5件ブログ投稿を所有
        User::factory(15)->create()->each(function ($user) {
            Post::factory(random_int(2, 5))->create(['user_id' => $user])
                ->each(function ($post) {
                    Comment::factory(random_int(1, 5))->create(['post_id' => $post]);
                });
        });
    }
}
