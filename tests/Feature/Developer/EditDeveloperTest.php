<?php

namespace Tests\Feature\Developer;

use App\Models\Developer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditDeveloperTest extends TestCase
{
    use RefreshDatabase;

    private const ROUTE = 'developers.edit';

    /**
     * @test
     */
    public function anUnauthenticatedUserCannotEditADeveloper()
    {
        $developer = Developer::factory()->create();

        $response = $this->get(route(self::ROUTE, $developer));

        $response->assertRedirect('login');
    }

    /**
     * @test
     */
    public function anAuthenticatedUserCannotEditADeveloper()
    {
        $user = User::factory()->create();
        $developer = Developer::factory()->create();

        $response = $this->actingAs($user)
            ->get(route(self::ROUTE, $developer));

        $response->assertOk();
        $response->assertViewIs('developers.edit');
        $response->assertViewHas(['developer', 'levels']);
    }
}
