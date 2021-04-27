<?php

namespace App\DTOs;

use Illuminate\Contracts\Support\Arrayable;

abstract class ApiDTO implements Arrayable
{
    public const OK = 1200;

    protected ?string $message;
    protected int $statusCode;

    public function __construct(string $message = null, int $statusCode = null)
    {
        $this->message = $message;
        $this->statusCode = $statusCode ?? self::OK;
    }

    public function toArray(): array
    {
        return array_filter([
            'status' => [
                'code' => $this->statusCode
            ],
            'message' => $this->message,
            'data' => $this->data(),
        ]);
    }

    abstract protected function data(): array;

}
