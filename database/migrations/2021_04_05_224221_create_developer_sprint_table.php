<?php

use App\Models\Developer;
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
            $table->foreignIdFor(Developer::class)->constrained();
            $table->unsignedBigInteger('sp_assigned');
            $table->unsignedBigInteger('sp_consumed')->nullable();
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
        Schema::dropIfExists('developer_sprint');
    }
}
