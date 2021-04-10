<?php

namespace Tests\Feature\Developer;

use App\Enums\DeveloperLevels;
use App\Models\Developer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DataProviders\Developer\StoreOrUpdaterDataProvider;
use Tests\TestCase;

class UpdateDeveloperTest extends TestCase
{
    use RefreshDatabase;
    use StoreOrUpdaterDataProvider;

    private const ROUTE = 'developers.update';
    private Developer $developer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->developer = Developer::factory()->create();
    }

    /**
     * @test
     */
    public function anUnauthenticatedUserCannotUpdateADeveloper()
    {
        $response = $this->put(route(self::ROUTE, $this->developer));

        $response->assertRedirect('login');
    }

    /**
     * @test
     */
    public function anAuthenticatedUserCanUpdateADeveloper()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->put(route(self::ROUTE, $this->developer),  $this->developerData());

        $developer = Developer::first();

        $response->assertRedirect(route('developers.show', $developer));
        $this->assertEquals('test name', $developer->name);
        $this->assertEquals('test@test.com', $developer->email);
        $this->assertEquals(DeveloperLevels::JUNIOR, $developer->level);
    }

    /**
     * @test
     * @dataProvider getDataProvider
     */
    public function anAuthenticatedUserCannotUpdateADeveloperDueToErrors($field, $data)
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)->put(route(self::ROUTE, $this->developer), $data);

        $response->assertSessionHasErrors($field);
    }

    /**
     * @test
     */
    public function anAuthenticatedUserCannotUpdateADeveloperDueToDuplicatedEmail()
    {

        $user = User::factory()->create();
        Developer::factory()->create([
            'email' => 'test@test.com'
        ]);

        $response = $this->actingAs($user)->put(route(self::ROUTE, $this->developer), $this->developerData());

        $response->assertSessionHasErrors('email');
    }
}
