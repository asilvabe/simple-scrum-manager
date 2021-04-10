<?php

namespace App\Actions\Teams;

use App\Models\Team;

class StoreOrUpdateTeam
{
    public static function execute(array $data, Team $team = null): Team
    {
        $team = $team ?? new Team();
        $team->name = $data['name'];
        $team->scrum_master_id = $data['scrum-master'];
        $team->save();

        return $team;
    }
}
