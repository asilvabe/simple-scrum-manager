<?php

namespace Tests\Feature\Concerns;

trait HasDestroyTests
{
    public function testItCanDestroy(): void
    {
        $response = $this->actingAs($this->user())->{$this->method}($this->route());

        $response->assertRedirect();
        $response->assertSessionHasNoerrors();
        $this->assertCount(0, $this->modelName()::get());
    }
}
