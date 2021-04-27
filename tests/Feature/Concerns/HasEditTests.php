<?php

namespace Tests\Feature\Concerns;

trait HasEditTests
{
    /**
     * @dataProvider fieldsProvider
     * @param string $field
     */
    public function testItHasEditionFields(string $field)
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get($this->route());
        $response->assertSee($field);
    }
}
