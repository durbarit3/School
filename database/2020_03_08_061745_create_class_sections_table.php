<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('section_id');
            $table->boolean('is_assigned_teacher')->default(0);
            $table->boolean('is_assigned_subject')->default(0);
            $table->string('deleted_status')->nullable();
            $table->string('deleted_at')->timestamps();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_sections');
    }
}
