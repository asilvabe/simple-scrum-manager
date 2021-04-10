<?php

namespace Tests\Feature\Developer;

use App\Models\Developer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowDeveloperTest extends TestCase
{
    use RefreshDatabase;

    private const ROUTE = 'developers.show';

    /**
     * @test
     */
    public function anUnauthenticatedUserCannotShowDevelopers()
    {
        $developer = Developer::factory()->create();

        $response = $this->get(route(self::ROUTE, $developer));

        $response->assertRedirect('login');
    }

    /**
     * @test
     */
    public function anAuthenticatedUserCanShowDevelopers()
    {
        $user = User::factory()->create();

        $developer = Developer::factory()->create();

        $response = $this->actingAs($user)
            ->get(route(self::ROUTE, $developer));

        $developerFromResponse = $response['developer'];
        $response->assertOk();
        $response->assertViewIs('developers.show');
        $response->assertViewHas('developer');
        $this->assertEquals($developerFromResponse->name, $developer->name);
        $this->assertEquals($developerFromResponse->email, $developer->email);
        $this->assertEquals($developerFromResponse->level, $developer->level);
    }
}
