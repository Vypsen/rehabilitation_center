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
        Schema::create('patient_skills', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->cascadeOnDelete();

            $table->boolean('lying_turn')->default(0);
            $table->boolean('sits_down')->default(0);
            $table->boolean('sits')->default(0);
            $table->boolean('gets_up')->default(0);
            $table->boolean('to_stand')->default(0);
            $table->boolean('get_up_sits_down')->default(0);
            $table->boolean('helps_walking_room')->default(0);
            $table->boolean('stairwell')->default(0);
            $table->boolean('walking_street')->default(0);
            $table->boolean('walking_room')->default(0);
            $table->boolean('raise_item')->default(0);
            $table->boolean('walks_gravel')->default(0);
            $table->boolean('washes')->default(0);
            $table->boolean('ladder')->default(0);
            $table->boolean('running')->default(0);

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
        Schema::dropIfExists('patient_skills');
    }
};
