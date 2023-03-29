<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_mobility', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->cascadeOnDelete();

            $table->boolean('lying_turn');
            $table->boolean('sits_down');
            $table->boolean('sits');
            $table->boolean('gets_up');
            $table->boolean('to_stand');
            $table->boolean('get_up_sits_down');
            $table->boolean('helps_walking_room');
            $table->boolean('stairwell');
            $table->boolean('walking_street');
            $table->boolean('walking_room');
            $table->boolean('raise_item');
            $table->boolean('walks_gravel');
            $table->boolean('washes');
            $table->boolean('ladder');
            $table->boolean('running');

            $table->integer('edate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_mobility');
    }
};
