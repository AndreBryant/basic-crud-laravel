<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIDs = User::pluck('id')->toArray();
        $postIDs = Post::pluck('id')->toArray();
        return [
            'user_id' => Arr::random($userIDs),
            'post_id' => Arr::random($postIDs),
            'body' => fake()->sentence()
        ];
    }
}
