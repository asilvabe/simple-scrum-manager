<?php

namespace Tests\Feature\Concerns;

trait HasAuthorizationTests
{
    public function testAGuestUserIsRedirectedToTheLoginRoute()
    {
        $route = $this->route();
        $response = $this->get($route);
        $response->assertRedirect(route('login'));
    }
}
