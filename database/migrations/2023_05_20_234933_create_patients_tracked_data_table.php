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

            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->cascadeOnDelete();

            $table->integer('hand_tactility')->nullable()->default(0);
            $table->integer('hand_t')->nullable()->default(0);
            $table->integer('hand_pain')->nullable()->default(0);
            $table->integer('hand_musculoskeletal_feeling')->nullable()->default(0);

            $table->integer('leg_tactility')->nullable()->default(0);
            $table->integer('leg_t')->nullable()->default(0);
            $table->integer('leg_pain')->nullable()->default(0);
            $table->integer('leg_musculoskeletal_feeling')->nullable()->default(0);

            $table->string('type_disorder')->nullable();
            $table->string('memory_loss')->nullable();
            $table->string('orientation')->nullable();
            $table->string('edema')->nullable();

            $table->boolean('shortness')->nullable()->default(0);
            $table->boolean('cough')->nullable()->default(0);
            $table->boolean('asthma')->nullable()->default(0);
            $table->boolean('smoking')->nullable()->default(0);

            $table->integer('sleep_count')->nullable();
            $table->boolean('insomnia')->nullable()->default(0);
            $table->boolean('sedatives')->nullable()->default(0);

            $table->integer('SRM');
            $table->foreign('SRM')
                ->references('point')->on('SRM_descr')
                ->cascadeOnDelete();

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
