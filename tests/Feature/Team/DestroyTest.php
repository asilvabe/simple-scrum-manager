<?php

namespace Tests\Feature\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\DestroyTestCase;
use Tests\Feature\Team\Concerns\HasTeam;
use Tests\Feature\Team\Concerns\HasUser;

class DestroyTest extends DestroyTestCase
{
    use RefreshDatabase;
    use HasTeam;
    use HasUser;

    protected function route(): string
    {
        return route('teams.destroy', $this->model());
    }
}
