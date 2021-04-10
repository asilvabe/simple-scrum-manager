<?php

namespace Tests\Feature\Developer;

use App\Models\Developer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexDeveloperTest extends TestCase
{
    use RefreshDatabase;

    private const ROUTE = 'developers.index';

    /**
     * @test
     */
    public function anUnauthenticatedUserCannotIndexDevelopers()
    {
        $response = $this->get(route(self::ROUTE));

        $response->assertRedirect('login');
    }

    /**
     * @test
     */
    public function anAuthenticatedUserCanIndexDevelopers()
    {
        $user = User::factory()->create();

        $developers = Developer::factory()->count(2)->create();

        $response = $this->actingAs($user)
            ->get(route(self::ROUTE));

        $developersFromResponse = $response['developers'];

        $response->assertViewIs('developers.index');
        $response->assertViewHas('developers');
        $developersFromResponse->each(function($item) use($developers) {
            $this->assertTrue($developers->contains($item));
        });

    }
}
