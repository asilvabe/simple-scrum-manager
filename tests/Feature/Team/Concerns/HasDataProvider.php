<?php


namespace Tests\Feature\Team\Concerns;


use App\Models\User;

trait HasDataProvider
{
    protected function data(): array
    {
        return [
            'name' => 'Test team',
            'scrum-master' => User::latest()->first()->id,
        ];
    }
}
