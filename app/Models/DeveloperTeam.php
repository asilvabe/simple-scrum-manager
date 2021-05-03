<?php

namespace App\Models;

use App\Models\Concerns\HasSprintsStats;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @method static ofTeam(mixed $input)
 * @method static create(array $array)
 */
class DeveloperTeam extends Pivot
{
    use HasFactory;
    use HasSprintsStats;

    public $incrementing = true;

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function scopeOfTeam(Builder $query, int $team): Builder
    {
        return $query->where('team_id', $team);
    }

    public function scopeDeveloper(int $developer, Builder $query): Builder
    {
        return $query->where('developer_id', $developer);
    }
}
