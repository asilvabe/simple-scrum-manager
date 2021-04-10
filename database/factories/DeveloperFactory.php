<?php

namespace Database\Factories;

use App\Enums\DeveloperLevels;
use App\Models\Developer;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeveloperFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
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
