<?php

namespace Tests\Feature\Concerns;

trait HasResponseTests
{
    public function testItReturnTheCorrectView()
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get($this->route());
        $response->assertViewIs($this->viewName());
    }
}
