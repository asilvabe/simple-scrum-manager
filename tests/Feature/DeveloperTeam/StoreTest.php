<?php

namespace Tests\Feature\DeveloperTeam;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\DataProviders\DeveloperTeam\StoreDataProvider;
use Tests\Feature\DeveloperTeam\Concerns\HasArtifacts;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;
    use HasArtifacts;
    use StoreDataProvider;

    public function testItCanStoreADeveloperTeam(): void
    {
        $team = $this->team();
        $developer = $this->developer();

        $response = $this->actingAs(
            $this->user())->postJson($this->route(),
            ['team' => $team->id, 'developer' => $developer->id]);

        $response->assertCreated();

        $this->assertDatabaseHas('developer_team', ['team_id' => $team->id, 'developer_id' => $developer->id]);
    }

    private function route(): string
    {
        return route('api.developer-teams.store');
    }

    public function testItDontStoreADeveloperWhenItsAlReadyAttached(): void
    {
        $team = $this->team();
        $developer = $this->developer();
        $team->developers()->attach($developer);

        $response = $this->actingAs(
            $this->user())->postJson($this->route(),
            ['team' => $team->id, 'developer' => $developer->id]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param string $field
     * @param string $error
     * @param array $request
     * @dataProvider getDataProvider
     */
    public function testItValidatesTheRequest(string $field, string $error, array $request): void
    {
        $this->team();
        $this->developer();
        $route = $this->route();

        $response = $this->actingAs($this->user())->postJson($route, $request);

        $response->assertJsonValidationErrors([$field => $error]);
    }
}
