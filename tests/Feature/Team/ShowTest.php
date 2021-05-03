<?php

namespace Tests\Feature\Team;

use Tests\Feature\ShowTestCase;
use Tests\Feature\Team\Concerns\HasTeam;
use Tests\Feature\Team\Concerns\HasUser;

class ShowTest extends ShowTestCase
{
    use HasTeam;
    use HasUser;

    public function testItShowTeamData(): void
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get($this->route());
        $response->assertOk();
    }

    protected function route(): string
    {
        return route('teams.show', $this->model());
    }

    protected function viewName(): string
    {
        return 'teams.show';
    }
}
