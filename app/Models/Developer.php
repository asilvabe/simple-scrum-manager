<?php

namespace App\Models;

use App\Models\Concerns\HasSprintsStats;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

/**
 * @property int id
 */
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

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)->using(DeveloperTeam::class);
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(Str::contains($search, '@') ? 'email' : 'name', 'like',  "%$search%");
    }
}
