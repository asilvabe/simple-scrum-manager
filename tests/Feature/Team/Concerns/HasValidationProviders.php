<?php

namespace Tests\Feature\Team\Concerns;

use Illuminate\Support\Str;

trait HasValidationProviders
{
    public function validationDataProvider(): array
    {
        return [
            'Test name rule required' => ['name', ''],
            'Test name rule min' => ['name', 'abc'],
            'Test name rule max' => ['name', Str::random(81)],
            'Test scrum master rule required' => ['scrum-master', null],
            'Test scrum master rule numeric' => ['scrum-master', 'abc'],
            'Test scrum master rule exists' => ['scrum-master', 200],
        ];
    }
}
