<?php

namespace Tests\Feature\Team\Concerns;

trait HasFieldsProvider
{
    public function fieldsProvider(): array
    {
        return [
            ['name']
        ];
    }
}
