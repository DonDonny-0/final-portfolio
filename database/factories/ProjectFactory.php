<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::find(1, 'id'),
            'title' => fake()->words(2, true),
            'feature_image' => 'https://picsum.photos/200',
            'description' => fake()->paragraph(),
            'tech_stack' => fake()->randomElements(['Laravel', 'React', 'Vue', 'Tailwindcss', 'PHP', 'TypeScript'], 3),
            'github_url' => fake()->url(),
        ];
    }
}
