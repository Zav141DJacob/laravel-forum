<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

//        $table->id();
//        $table->foreignId('user_id');
//        $table->foreignId('category_id');
//        $table->string('slug')->unique();
//        $table->string('title');
//        $table->text('excerpt');
//        $table->text('body');
//        $table->timestamps();
//        $table->timestamp('published_at')->nullable();
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(),
            'thumbnail' => null,
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
        ];
    }
}
