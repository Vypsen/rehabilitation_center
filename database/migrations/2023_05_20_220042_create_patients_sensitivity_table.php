<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_sensitivity', function (Blueprint $table) {
            $table->id();

            $table->integer('id_patient')->unsigned();
            $table->foreign('id_patient')
                ->references('id')->on('patients')
                ->cascadeOnDelete();

            $table->enum('body_part', ['l_hand', 'r_hand', 'l_leg', 'r_leg']);
            $table->boolean('tactility');
            $table->boolean('t');
            $table->boolean('pain');
            $table->boolean('musculoskeletal_feeling');

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
        Schema::dropIfExists('patients_sensitivity');
    }
};
