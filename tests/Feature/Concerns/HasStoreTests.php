<?php

namespace Tests\Feature\Concerns;

trait HasStoreTests
{
    public function testItCanStore()
    {
        $response = $this->actingAs($this->user())->{$this->method}($this->route(), $this->data());

        $response->assertRedirect();
        $response->assertSessionHasNoerrors();
        $this->assertCount(1, $this->modelName()::get());

    }
}
