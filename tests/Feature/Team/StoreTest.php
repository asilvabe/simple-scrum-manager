<?php


namespace Tests\Feature\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\StoreTestCase;
use Tests\Feature\Team\Concerns\HasDataProvider;
use Tests\Feature\Team\Concerns\HasTeam;
use Tests\Feature\Team\Concerns\HasUser;
use Tests\Feature\Team\Concerns\HasValidationProviders;

class StoreTest extends StoreTestCase
{
    use RefreshDatabase;
    use HasTeam;
    use HasUser;
    use HasValidationProviders;
    use HasDataProvider;

    protected function route(): string
    {
        return route('teams.store');
    }
}
