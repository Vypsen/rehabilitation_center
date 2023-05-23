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
        Schema::create('patients_secretions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_patient')->unsigned();
            $table->foreign('id_patient')
                ->references('id')->on('patients')
                ->cascadeOnDelete();

            $table->boolean('urine_incontinence')->nullable();
            $table->boolean('frequent_urination')->nullable();
            $table->unsignedInteger('nikturia_count')->nullable();

            $table->boolean('excrement_incontinence')->nullable();
            $table->unsignedInteger('defecation_count')->nullable();

            $table->boolean('laxative')->nullable();
            $table->unsignedInteger('laxative_count')->nullable();
            $table->unsignedInteger('laxative_name')->nullable();

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
        Schema::dropIfExists('patients_secretions');
    }
};
