<?php

use App\Models\Developer;
use App\Models\Team;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_team', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Developer::class, 'developer_id')->constrained();
            $table->foreignIdFor(Team::class, 'team_id')->constrained();
            $table->unsignedInteger('sprints_count')->nullable();
            $table->unsignedInteger('sp_assigned')->nullable();
            $table->unsignedInteger('sp_consumed')->nullable();
            $table->timestamps();

            $table->unique(['team_id', 'developer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developer_team');
    }
}
