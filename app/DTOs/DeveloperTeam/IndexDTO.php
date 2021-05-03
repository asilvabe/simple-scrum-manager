<?php

namespace App\DTOs\DeveloperTeam;

use App\DTOs\ApiDTO;
use App\DTOs\Contracts\CollectionContract;
use Illuminate\Support\Collection;

class IndexDTO extends ApiDTO implements CollectionContract
{
    private Collection $developers;

    public function __construct(Collection $developers, string $statusMessage = null, int $statusCode = null)
    {
        $this->developers = $developers;
        parent::__construct($statusMessage, $statusCode);
    }

    protected function data(): array
    {
        return $this->developers->transform(function($item) {
            return [
                'id' => $item->id,
                'level' => $item->developer->level,
                'name' => $item->developer->name,
                'email' => $item->developer->email,
                'sprints_count' => $item->sprints_count,
                'sp_assigned' => $item->sp_assigned,
                'sp_consumed' => $item->sp_consumed,
                'velocity' => $item->velocity(),
                'compliance' => $item->compliance(),
            ];
        })->toArray();
    }
}
