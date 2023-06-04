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
        Schema::create('general_info_patients', function (Blueprint $table) {
            $table->id();

            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->cascadeOnDelete();

            $table->dateTimeTz('visit_date')->nullable();
            $table->dateTimeTz('disease_date')->nullable();
            $table->string('address')->nullable();
            $table->string('relatives_info')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('type_body')->nullable();

            $table->string('disease')->nullable();
            $table->string('extra_disease')->nullable();
            $table->string('allergy')->nullable();
            $table->string('glucose')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('Ps')->nullable();
            $table->string('SpO')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('dysphasia')->nullable();
            $table->string('visual_or_sensory_extinction')->nullable();
            $table->string('swallowing')->nullable();
            $table->string('talk')->nullable();
            $table->string('nerv_status')->nullable();
            $table->string('anxiety')->nullable();
            $table->string('cardio_system')->nullable();
            $table->boolean('stents')->nullable()->default(0);
            $table->boolean('cardiostimulator')->nullable()->default(0);
            $table->string('pain_place')->nullable();
            $table->string('pain_periodicity')->nullable();
            $table->boolean('skin_damage')->nullable()->default(0);
            $table->string('skin_damage_place')->nullable();

            $table->boolean('urine_incontinence')->nullable()->default(0);
            $table->boolean('frequent_urination')->nullable()->default(0);
            $table->unsignedInteger('nikturia_count')->nullable();
            $table->boolean('urinary_catheter')->nullable()->default(0);
            $table->boolean('rep_urinary_infection')->nullable()->default(0);
            $table->string('urine_features')->nullable();

            $table->boolean('excrement_incontinence')->nullable()->default(0);
            $table->unsignedInteger('defecation_count')->nullable();

            $table->boolean('laxative')->nullable()->default(0);
            $table->unsignedInteger('laxative_count')->nullable();
            $table->string('laxative_name')->nullable();
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
        Schema::dropIfExists('general_info_patients');
    }
};
