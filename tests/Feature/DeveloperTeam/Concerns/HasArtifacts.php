<?php

namespace Tests\Feature\DeveloperTeam\Concerns;

use App\Models\Developer;
use App\Models\Team;
use App\Models\User;

trait HasArtifacts
{
    private function team(): Team
    {
        return Team::factory()->create();
    }

    public function developer(): Developer
    {
        return Developer::factory()->create();
    }

    private function user(): User
    {
        return User::factory()->create();
    }
}
