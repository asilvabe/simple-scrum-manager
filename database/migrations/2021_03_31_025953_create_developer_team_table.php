<?php

use App\Enums\DeveloperLevels;
use App\Models\Person;
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
            $table->unsignedBigInteger('developer_id');
            $table->foreignIdFor(Team::class)->constrained();
            $table->enum('level', DeveloperLevels::toArray());
            $table->timestamps();

            $table->foreign('developer_id')->references('id')->on('people');
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
