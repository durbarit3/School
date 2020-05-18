<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_section_id');
            $table->unsignedBigInteger('employee_id');
            $table->boolean('status')->default(1);
            $table->string('deleted_status')->nullable(0);
            $table->string('deleted_at')->timestamps();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
             $table->foreign('class_section_id')->references('id')->on('class_sections')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_teachers');
    }
}
