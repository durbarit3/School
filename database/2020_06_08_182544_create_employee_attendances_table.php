<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->bigInteger('role_known_id')->nullable();
            $table->string('date');
            $table->string('year');
            $table->string('month');
            $table->string('attendance_status');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * 
     */

    public function down()
    {
        Schema::dropIfExists('employee_attendances');
    }
}
