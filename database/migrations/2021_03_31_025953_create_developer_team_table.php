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
            $table->foreignIdFor(Developer::class)->constrained();
            $table->foreignIdFor(Team::class)->constrained();
            $table->unsignedInteger('sprints_count')->default(0);
            $table->unsignedInteger('sp_assigned')->default(0);
            $table->unsignedInteger('sp_consumed')->default(0);
            $table->timestamps();
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
