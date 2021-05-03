<?php

namespace Tests\Feature\Concerns;

trait HasCreateTests
{
    /**
     * @dataProvider fieldsProvider
     * @param string $field
     */
    public function testItHasCreationFields(string $field)
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get($this->route());
        $response->assertSee($field);
    }
}
