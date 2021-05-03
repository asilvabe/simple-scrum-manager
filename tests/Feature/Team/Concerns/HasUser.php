<?php

namespace Tests\Feature\Team\Concerns;

use App\Models\User;

trait HasUser
{
    protected function user(): User
    {
        return User::factory()->create();
    }
}
