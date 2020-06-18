<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * 
     */
    public function up()
    {
        Schema::create('exam_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('year')->nullable();
            $table->string('starting_time')->nullable();
            $table->string('ending_time')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('exam_hall_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->string('distributions')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('deleted_status')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('exam_hall_id')->references('id')->on('exam_halls')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_schedules');
    }
}
