<?php

namespace App\Models;

use App\Helpers\Math;
use App\Models\Concerns\HasSprintsStats;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property Carbon completed_at
 */
class Sprint extends Model
{
    use HasFactory;
    use HasSprintsStats;

    protected $dates = [
        'starts_at',
        'ends_at',
        'completed_at',
    ];

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(Developer::class, 'person_sprint');
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->whereNotNull('completed_at');
    }

    public function isCompleted(): bool
    {
        return (bool)$this->completed_at;
    }
}
