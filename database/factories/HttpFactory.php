<?php

namespace Database\Factories;

use App\Models\Https;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Https>
 */
class HttpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slackUsername' => 'Prisca',
            'backend' => true,
            'age' => 23,
            'bio' => 'Aspiring backend developer'
        ];
    }
}
