<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmitCardTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admit_card_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('template_name')->nullable();
            $table->string('heading')->nullable();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->string('school_name')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('left_logo')->nullable();
            $table->string('right_logo')->nullable();
            $table->boolean('is_student_photo')->nullable();
            
            $table->timestamps();
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
        Schema::dropIfExists('admit_card_templates');
    }
}
