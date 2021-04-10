<?php

namespace App\Models;

use App\Enums\DeveloperLevels;
use App\Models\Concerns\HasSprintsStats;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property Collection developers
 * @property string name
 * @property Collection sprints
 * @property null|int sprints_count
 * @property null|int sp_assigned
 * @property null|int sp_consumed
 * @property User scrumMaster
 */
class Team extends Model
{
    use HasFactory;
    use HasSprintsStats;

    public function scrumMaster(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'scrum_master_id');
    }

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(Developer::class)->withPivot(['sprints_count', 'sp_assigned','sp_consumed']);
    }

    public function sprints(): HasMany
    {
        return $this->hasMany(Sprint::class);
    }
}
