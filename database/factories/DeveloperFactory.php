<?php

namespace Database\Factories;

use App\Enums\DeveloperLevels;
use App\Models\Developer;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeveloperFactory extends Factory
{
    protected $model = Developer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'level' => $this->faker->randomElement(DeveloperLevels::toArray()),
        ];
    }
}
