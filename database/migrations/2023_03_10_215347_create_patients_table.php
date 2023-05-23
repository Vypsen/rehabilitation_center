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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->cascadeOnDelete();

            $table->integer('visit_date')->nullable();
            $table->integer('disease_date')->nullable();
            $table->string('address')->nullable();
            $table->string('relatives_info')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('type_body')->nullable();

            $table->string('disease')->nullable();
            $table->string('extra_disease')->nullable();
            $table->string('allergy')->nullable();
            $table->integer('glucose')->nullable();
            $table->integer('blood_pressure')->nullable();
            $table->integer('Ps')->nullable();
            $table->integer('SpO')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('visual/sensory_extinction')->nullable();
            $table->string('swallowing')->nullable();
            $table->string('talk')->nullable();
            $table->string('dysphasia')->nullable();
            $table->string('nerv_status')->nullable();
            $table->string('orientation')->nullable();
            $table->string('anxiety')->nullable();
            $table->boolean('arterial_hypertension')->nullable();
            $table->boolean('ischemia')->nullable();
            $table->boolean('fibrillation')->nullable();
            $table->boolean('stents')->nullable();
            $table->boolean('cardiostimulator')->nullable();
            $table->boolean('dyspnoea')->nullable();
            $table->string('pain')->nullable();

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
        Schema::dropIfExists('patients');
    }
};
