<?php

namespace Tests\Feature\Team;

use Tests\Feature\EditTestCase;
use Tests\Feature\Team\Concerns\HasTeam;
use Tests\Feature\Team\Concerns\HasFieldsProvider;
use Tests\Feature\Team\Concerns\HasUser;

class EditTest extends EditTestCase
{
    use HasTeam;
    use HasUser;
    use HasFieldsProvider;


    protected function viewName(): string
    {
        return 'teams.edit';
    }

    protected function route(): string
    {
        return route('teams.edit', $this->model());
    }
}
