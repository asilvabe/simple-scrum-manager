<?php

namespace Tests\Feature\Concerns;

trait HasUpdateTests
{
    public function testItCanStore()
    {
        $response = $this->actingAs($this->user())->{$this->method}($this->route(), $this->data());

        $response->assertRedirect();
        $response->assertSessionHasNoerrors();
    }
}
