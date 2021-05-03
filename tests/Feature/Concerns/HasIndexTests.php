<?php

namespace Tests\Feature\Concerns;

use Illuminate\Pagination\AbstractPaginator;

trait HasIndexTests
{
    public function testItHasACollection()
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get($this->route());

        $response->assertViewHas($this->collectionName());
    }

    public function testItHasAPaginator()
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get($this->route());

        $collection = $this->getDataItem($response, $this->collectionName());

        $this->assertInstanceOf(AbstractPaginator::class, $collection);
    }

    /**
     * @dataProvider fieldsProvider
     * @param string $field
     */
    public function testItHasIndexFields(string $field)
    {
        $user = $this->user();
        $this->models();
        $response = $this->actingAs($user)->get($this->route());

        $collection = $this->getDataItem($response, $this->collectionName());

        $response->assertSeeText($collection->random()->{$field});

        $response->assertSee($field);
    }
}
