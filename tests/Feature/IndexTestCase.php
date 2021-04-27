<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Concerns\HasAuthorizationTests;
use Tests\Feature\Concerns\HasIndexTests;
use Tests\Feature\Concerns\HasResponseData;
use Tests\Feature\Concerns\HasResponseTests;
use Tests\TestCase;

abstract class IndexTestCase extends TestCase
{
    use RefreshDatabase;
    use HasAuthorizationTests;
    use HasResponseTests;
    use HasIndexTests;
    use HasResponseData;

    abstract protected function models();

    abstract protected function collectionName(): string;

    abstract protected function viewName(): string;

    abstract protected function user(): User;

    abstract protected function route(): string;

    abstract public function fieldsProvider(): array;
}
