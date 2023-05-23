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
        Schema::create('patients_tracked_data', function (Blueprint $table) {
            $table->id();

            $table->integer('id_patient')->unsigned();
            $table->foreign('id_patient')
                ->references('id')->on('patients')
                ->cascadeOnDelete();

            $table->integer('l_hand')->unsigned();
            $table->foreign('l_hand')
                ->references('id')->on('patients_sensitivity')
                ->cascadeOnDelete();

            $table->integer('r_hand')->unsigned();
            $table->foreign('r_hand')
                ->references('id')->on('patients_sensitivity')
                ->cascadeOnDelete();

            $table->integer('l_leg')->unsigned();
            $table->foreign('l_leg')
                ->references('id')->on('patients_sensitivity')
                ->cascadeOnDelete();

            $table->integer('r_leg')->unsigned();
            $table->foreign('r_leg')
                ->references('id')->on('patients_sensitivity')
                ->cascadeOnDelete();

            $table->string('memory_loss');
            $table->string('disorders');
            $table->string('orientation');
            $table->string('edema');

            $table->boolean('shortness');
            $table->boolean('cough');
            $table->boolean('asthma');
            $table->boolean('smoking');

            $table->string('sleep_hours');
            $table->boolean('insomnia');
            $table->boolean('sedatives');

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
        Schema::dropIfExists('patients_tracked_data');
    }
};
