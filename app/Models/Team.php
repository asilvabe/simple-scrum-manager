<?php

namespace App\Models;

use App\Enums\DeveloperLevels;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property Person scrumMaster
 * @property Person productOwner
 * @property Collection developers
 * @property string name
 */
class Team extends Model
{
    use HasFactory;

    public function scrumMaster(): HasOne
    {
        return $this->hasOne(Person::class, 'id', 'scrum_master_id');
    }

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(Developer::class)->withPivot(['level']);
    }

    public function sprints(): HasMany
    {
        return $this->hasMany(Sprint::class);
    }
}
