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
        Schema::create('scales_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('scale_id')->unsigned();
            $table->foreign('scale_id')
                ->references('id')->on('scales')
                ->cascadeOnDelete();

            $table->string('name');
            $table->integer('score');
            $table->string('comment');

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
        Schema::dropIfExists('scales_questions');
    }
};
