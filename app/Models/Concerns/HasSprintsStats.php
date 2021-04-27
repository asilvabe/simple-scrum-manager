<?php

namespace App\Models\Concerns;

use App\Helpers\Math;

trait HasSprintsStats
{
    public function storyPointsConsumed(): ?int
    {
        return $this->sp_consumed;
    }

    public function storyPointsAssigned(): ?int
    {
        return $this->sp_assigned;
    }

    public function sprintsCount(): ?int
    {
        return $this->sprints_count;
    }

    public function velocity(): ?int
    {
        return $this->sprintsCount() ? $this->storyPointsConsumed() / $this->sprintsCount() : null;
    }

    public function compliance(): ?int
    {
        if ($this->sp_assigned) {
            return Math::percentage($this->sp_consumed, $this->sp_assigned);
        }

        return null;
    }
}
