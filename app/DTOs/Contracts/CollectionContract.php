<?php

namespace App\DTOs\Contracts;

use Illuminate\Support\Collection;

interface CollectionContract
{
    public function __construct(Collection $data);
}
