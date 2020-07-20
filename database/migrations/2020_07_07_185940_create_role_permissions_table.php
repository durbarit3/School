<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('student_module');
            $table->text('academic_module');
            $table->text('exam_module');
            $table->text('attendance_module');
            $table->text('transport_module');
            $table->text('event_module');
            $table->text('employee_module');
            $table->text('human_resource_module');
            $table->text('income_module');
            $table->text('expanse_module');
            $table->text('attachment_book_module');
            $table->text('office_accounts_module');
            $table->text('hostel_module');
            $table->text('library_module');
            $table->text('fees_collection_module');
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
        Schema::dropIfExists('role_permissions');
    }
}
