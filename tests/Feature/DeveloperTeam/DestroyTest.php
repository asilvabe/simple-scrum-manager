<?php

namespace Tests\Feature\DeveloperTeam;

use App\Models\DeveloperTeam;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\DeveloperTeam\Concerns\HasArtifacts;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;
    use HasArtifacts;

    public function testItCanDetachADeveloperFromTeam(): void
    {
        $developerTeam = DeveloperTeam::factory()->create();
        $route = $this->route($developerTeam->id);

        $response = $this->actingAs($this->user())->deleteJson($route);

        $response->assertOk();
    }

    private function route(int $id): string
    {
        return route('api.developer-teams.destroy', $id);
    }
}
