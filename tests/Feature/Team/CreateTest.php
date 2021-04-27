<?php

namespace Tests\Feature\Team;

use Tests\Feature\CreateTestCase;
use Tests\Feature\Team\Concerns\HasTeam;
use Tests\Feature\Team\Concerns\HasFieldsProvider;
use Tests\Feature\Team\Concerns\HasUser;

class CreateTest extends CreateTestCase
{
    use HasTeam;
    use HasUser;
    use HasFieldsProvider;

    protected function viewName(): string
    {
        return 'teams.create';
    }

    protected function route(): string
    {
        return route('teams.create');
    }
}
