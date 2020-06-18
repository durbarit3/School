<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_applies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('apply_date')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('leave_type_id')->nullable();
            $table->text('reason')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->tinyInteger('approval')->nullable(0);
            $table->string('attachment_file')->nullable(0);
            $table->boolean('status')->default(1);
            $table->boolean('deleted_status')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_applies');
    }
}
