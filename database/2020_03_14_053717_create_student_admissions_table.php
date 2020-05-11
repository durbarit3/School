<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('admission_no')->unique();
            $table->string('roll_no')->unique();
            $table->integer('class');
            $table->integer('section');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->integer('gender');
            $table->string('date_of_birth')->nullable();
            $table->integer('category')->nullable();
            $table->string('religion')->nullable();
            $table->string('student_mobile')->nullable();
            $table->string('student_email')->nullable();
            $table->integer('blood_group')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('admission_date');
            $table->string('nid_or_birthid')->nullable();
            $table->string('student_photo');
            $table->string('father_name');
            $table->string('father_phone');
            $table->string('father_occupation')->nullable();
            $table->string('father_photo')->nullable();
            $table->string('mother_name');
            $table->string('mother_phone')->nullable();
            $table->string('mother_occuparion')->nullable();
            $table->string('mother_photo')->nullable();
            $table->integer('if_guardian_is')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('guardian_photo')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('guardian_address')->nullable();
            $table->text('current_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->integer('route_id')->nullable();
            $table->integer('vehicle_id')->nullable();
            $table->integer('hostel_id')->nullable();
            $table->integer('room_num')->nullable();
            $table->text('previous_school_detail')->nullable();
            $table->text('previous_school_note')->nullable();
            $table->text('docu_title1')->nullable();
            $table->string('docu_1')->nullable();
            $table->text('docu_title2')->nullable();
            $table->string('docu_2')->nullable();
            $table->text('docu_title3')->nullable();
            $table->string('docu_3')->nullable();
            $table->text('docu_title4')->nullable();
            $table->string('docu_4')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('deleted_at')->nullable();
            $table->string('deleted_status')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('student_admissions');
    }
}
