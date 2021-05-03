<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Concerns\HasAuthorizationTests;
use Tests\Feature\Concerns\HasStoreTests;
use Tests\Feature\Concerns\HasValidationTests;
use Tests\TestCase;

abstract class StoreTestCase extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use HasAuthorizationTests;
    use HasValidationTests;
    use HasStoreTests;

    protected string $method = 'post';

    abstract protected function model(): Model;

    abstract protected function modelName(): string;

    abstract protected function user(): User;

    abstract protected function route(): string;

    abstract public function validationDataProvider(): array;

    abstract protected function data(): array;
}
