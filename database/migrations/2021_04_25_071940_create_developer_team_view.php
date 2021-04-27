<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDeveloperTeamView extends Migration
{
    public function up(): void
    {
        DB::unprepared(file_get_contents(base_path('database/views/create_developer_team_view.sql')));
    }

    public function down(): void
    {
        DB::unprepared('drop view developer_team_view');
    }
}
