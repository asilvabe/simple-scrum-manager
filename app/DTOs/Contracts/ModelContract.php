<?php

namespace App\DTOs\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ModelContract
{
    public function __construct(Model $model);
}
