<?php

namespace Tests\Feature\Team;

use Tests\Feature\Team\Concerns\HasDataProvider;
use Tests\Feature\Team\Concerns\HasValidationProviders;
use Tests\Feature\UpdateTestCase;
use Tests\Feature\Team\Concerns\HasTeam;
use Tests\Feature\Team\Concerns\HasUser;

class UpdateTest extends UpdateTestCase
{
    use HasTeam;
    use HasUser;
    use HasValidationProviders;
    use HasDataProvider;

    protected function route(): string
    {
        return route('teams.update', $this->model);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = $this->model();
    }
}
