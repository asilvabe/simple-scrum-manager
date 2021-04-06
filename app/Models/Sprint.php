<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sprint extends Model
{
    use HasFactory;

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'person_sprint');
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
