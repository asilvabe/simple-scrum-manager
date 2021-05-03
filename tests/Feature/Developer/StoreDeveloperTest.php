<?php

namespace Tests\Feature\Developer;

use App\Enums\DeveloperLevels;
use App\Models\Developer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DataProviders\Developer\StoreOrUpdaterDataProvider;
use Tests\TestCase;

class StoreDeveloperTest extends TestCase
{
    use RefreshDatabase;
    use StoreOrUpdaterDataProvider;

    private const ROUTE = 'developers.store';

    /**
     * @test
     */
    public function anUnauthenticatedUserCannotStoreADeveloper()
    {
        $response = $this->post(route(self::ROUTE));

        $response->assertRedirect('login');
    }

    /**
     * @test
     */
    public function anAuthenticatedUserCanStoreADeveloper()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route(self::ROUTE), $this->developerData());

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
    public function anAuthenticatedUserCannotStoreADeveloperDueToErrors($field, $data)
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route(self::ROUTE), $data);

       $response->assertSessionHasErrors($field);
    }

    /**
     * @test
     */
    public function anAuthenticatedUserCannotStoreADeveloperDueToDuplicatedEmail()
    {

        $user = User::factory()->create();
        Developer::factory()->create([
            'email' => 'test@test.com'
        ]);

        $response = $this->actingAs($user)->post(route(self::ROUTE), $this->developerData());

        $response->assertSessionHasErrors('email');
    }
}
