<?php


namespace Tests\Feature\Team\Concerns;


use App\Models\Team;

trait HasTeam
{
    protected function model(): Team
    {
        return Team::factory()->create();
    }

    protected function models()
    {
        Team::factory()->count(40)->create();
    }

    protected function collectionName(): string
    {
        return 'teams';
    }

    protected function modelName(): string
    {
        return Team::class;
    }
}
