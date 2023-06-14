<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
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
        Comment::truncate();
//        Post::truncate();
//        Category::truncate();
//        User::truncate();
        $user = User::factory()->create([
            'name' => "John Doe"
        ]);

        Post::factory(4)->create([
            'user_id' => $user->id
        ]);
//        Post::factory(20)->create();
        Comment::factory(20)->create();
    }
}
