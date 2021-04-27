<?php

namespace Database\Factories;

use App\Models\Developer;
use App\Models\DeveloperTeam;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeveloperTeamFactory extends Factory
{
    protected $model = DeveloperTeam::class;

    public function definition(): array
    {
        return [
            'developer_id' => Developer::factory(),
            'team_id' => Team::factory(),
        ];
    }
}
