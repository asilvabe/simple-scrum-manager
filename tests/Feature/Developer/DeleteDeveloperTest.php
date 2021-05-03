<?php

namespace Tests\Feature\Developer;

use App\Models\Developer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteDeveloperTest extends TestCase
{
    use RefreshDatabase;

    private const ROUTE = 'developers.destroy';

    /**
     * @test
     */
    public function anUnauthenticatedUserCannotDeleteDeveloper()
    {
        $developer = Developer::factory()->create();

        $response = $this->delete(route(self::ROUTE, $developer));

        $response->assertRedirect('login');
    }

    /**
     * @test
     */
    public function anAuthenticatedUserCanDeleteADeveloper()
    {
        $user = User::factory()->create();
        $developer = Developer::factory()->create();

        $response = $this->actingAs($user)
            ->delete(route(self::ROUTE, $developer));

        $response->assertRedirect(route('developers.index'));
        $this->assertDeleted($developer);
    }
}
