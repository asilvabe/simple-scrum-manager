<?php

namespace Tests\Feature\Developer;

use App\Models\Developer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateDeveloperTest extends TestCase
{
    use RefreshDatabase;

    private const ROUTE = 'developers.create';

    /**
     * @test
     */
    public function anUnauthenticatedUserCannotCreateADeveloper()
    {
        $response = $this->delete(route(self::ROUTE));

        $response->assertRedirect('login');
    }

    /**
     * @test
     */
    public function anAuthenticatedUserCanCreateADeveloper()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route(self::ROUTE));

        $response->assertOk();
        $response->assertViewIs('developers.create');
        $response->assertViewHas(['developer', 'levels']);
    }
}
