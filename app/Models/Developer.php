<?php

namespace App\Models;

use App\Helpers\Math;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Developer extends Person
{
    use HasFactory;

    private int $sprintsCount;

    public function sprints(): BelongsToMany
    {
        return $this->belongsToMany(Sprint::class)
            ->withPivot(['story_points_assigned', 'story_points_consumed']);
    }

    public function sprintsCount(): int
    {
        return $this->sprintsCount ?? $this->sprintsCount = $this->sprints()->count();
    }

    public function velocity(): ?int
    {
        return $this->sprintsCount()
            ? $this->sprints()->sum('story_points_consumed') / $this->sprintsCount()
            : null;
    }

    public function compliance(): int
    {
        if ($this->sprintsCount()) {
            $consumed = $this->historyPointsConsumed();
            $assigned = $this->historyPointsAssigned();

            return Math::percentage($consumed, $assigned);
        }

        return 0;
    }

    public function historyPointsAssigned(): int
    {
        return $this->sprints()->sum('story_points_assigned');
    }

    public function historyPointsConsumed(): int
    {
        return $this->sprints()->sum('story_points_consumed');
    }
}
