<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Blog;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'=>$this->faker->paragraph(),
            'user_id'=>User::factory(),
            'blog_id'=>Blog::factory()
        ];
    }
}
