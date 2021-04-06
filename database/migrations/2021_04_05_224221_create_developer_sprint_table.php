<?php

use App\Models\Person;
use App\Models\Sprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperSprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_sprint', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sprint::class)->constrained();
            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('story_points_assigned');
            $table->unsignedBigInteger('story_points_consumed')->default(0);
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
        Schema::dropIfExists('developer_sprint');
    }
}
