<?php

namespace App\Models;

use App\Models\Concerns\HasSprintsStats;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Developer extends Model
{
    use HasFactory;
    use HasSprintsStats;

    private int $sprintsCount;

    public function sprints(): BelongsToMany
    {
        return $this->belongsToMany(Sprint::class)
            ->withPivot(['story_points_assigned', 'story_points_consumed']);
    }
}
