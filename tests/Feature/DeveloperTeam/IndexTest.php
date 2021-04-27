<?php

namespace Tests\Feature\DeveloperTeam;

use App\Models\Developer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DataProviders\DeveloperTeam\IndexDataProvider;
use Tests\Feature\DeveloperTeam\Concerns\HasArtifacts;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;
    use IndexDataProvider;
    use HasArtifacts;

    public function testItCanListDevelopersFromATeam(): void
    {
        $team = $this->team();
        $route = $this->route($team->id);
        $team->developers()->attach(Developer::factory()->count(5)->create());

        $response = $this->actingAs($this->user())->getJson($route);

        $response->assertJsonCount(5, 'data');
    }

    private function route($team = null, array $params = []): string
    {
        $params = array_filter(compact('team') + $params);
        return route('api.developer-teams.index', $params);
    }

    /**
     * @param string $field
     * @param string $error
     * @param null $value
     * @dataProvider getDataProvider
     */
    public function testItValidatesTheRequest(string $field, string $error, $value = null): void
    {
        $route = $this->route($value);

        $response = $this->actingAs($this->user())->getJson($route);

        $response->assertJsonValidationErrors([$field => $error]);
    }

    public function testItReturnDevelopersOfATeam(): void
    {
        $team = $this->team();
        $route = $this->route($team->id);
        $developers = Developer::factory()->count(2)->create();
        $team->developers()->attach($developers->first());

        $response = $this->actingAs($this->user())->getJson($route);

        $response->assertDontSee($developers->last()->name);
    }
}
