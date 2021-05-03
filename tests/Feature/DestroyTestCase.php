<?php


namespace Tests\Feature;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Concerns\HasAuthorizationTests;
use Tests\Feature\Concerns\HasDestroyTests;
use Tests\TestCase;

abstract class DestroyTestCase extends TestCase
{
    use RefreshDatabase;
    use HasDestroyTests;
    use HasAuthorizationTests;
    use WithFaker;

    protected string $method = 'delete';
    protected Model $model;

    abstract protected function model(): Model;

    abstract protected function user(): User;

    abstract protected function route(): string;
}
