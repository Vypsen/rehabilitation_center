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
            $table->integer('id_patient')->unsigned();
            $table->foreign('id_patient')
                ->references('id')->on('patients')
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
        Schema::dropIfExists('patient_mobility');
    }
};
