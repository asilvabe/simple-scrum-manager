<?php

namespace App\ViewModels;

use App\Models\Team;
use Illuminate\Contracts\Support\Arrayable;

class TeamViewModel implements Arrayable
{

    private Team $team;

    public function setTeam(Team $team): self
    {
        $this->team = $team;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->team->name,
            'team' => $this->team,
            'scrumMaster' => $this->team->scrumMaster,
            'developers' => $this->team->developers,
        ];
    }
}
