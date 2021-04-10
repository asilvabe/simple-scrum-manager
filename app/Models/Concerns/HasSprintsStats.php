<?php

namespace App\Models\Concerns;

use App\Helpers\Math;

trait HasSprintsStats
{
    public function storyPointsConsumed(): ?int
    {
        return (int) $this->sp_consumed;
    }

    public function storyPointsAssigned(): int
    {
        return (int) $this->sp_assigned;
    }

    public function sprintsCount(): int
    {
        return (int) $this->sprints_count;
    }

    public function velocity(): int
    {
        return $this->sprintsCount() ? $this->storyPointsConsumed() / $this->sprintsCount() : 0;
    }

    public function compliance(): int
    {
        if ($assigned = $this->storyPointsAssigned()) {
            $consumed = $this->storyPointsConsumed();

            return Math::percentage($consumed, $assigned);
        }

        return 0;
    }
}
