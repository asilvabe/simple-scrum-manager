<?php

namespace Tests\Feature\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\IndexTestCase;
use Tests\Feature\Team\Concerns\HasTeam;
use Tests\Feature\Team\Concerns\HasUser;

class IndexTest extends IndexTestCase
{
    use RefreshDatabase;
    use HasTeam;
    use HasUser;

    protected function viewName(): string
    {
        return 'teams.index';
    }

    protected function route(): string
    {
        return route('teams.index');
    }

    public function fieldsProvider(): array
    {
        return [['name']];
    }
}
