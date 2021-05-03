<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Concerns\HasAuthorizationTests;
use Tests\Feature\Concerns\HasResponseTests;
use Tests\TestCase;

abstract class ShowTestCase extends TestCase
{
    use HasAuthorizationTests;
    use HasResponseTests;
    use RefreshDatabase;

    abstract protected function model(): Model;

    abstract protected function modelName(): string;

    abstract protected function viewName(): string;

    abstract protected function user(): User;

    abstract protected function route(): string;
}
