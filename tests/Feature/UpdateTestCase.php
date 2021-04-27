<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Concerns\HasAuthorizationTests;
use Tests\Feature\Concerns\HasValidationTests;
use Tests\TestCase;

abstract class UpdateTestCase extends TestCase
{
    use RefreshDatabase;
    use HasValidationTests;
    use HasAuthorizationTests;
    use WithFaker;

    protected string $method = 'put';
    protected Model $model;

    abstract protected function model(): Model;

    abstract protected function modelName(): string;

    abstract protected function user(): User;

    abstract protected function route(): string;
}
