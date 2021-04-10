<?php

namespace App\Actions\Developers;

use App\Models\Developer;

class StoreOrUpdateDeveloper
{
    public static function execute(array $data, Developer $developer = null): Developer
    {
        $developer = $developer ?? new Developer();
        $developer->name = $data['name'];
        $developer->email = $data['email'];
        $developer->level = $data['level'];
        $developer->save();

        return $developer;
    }
}
