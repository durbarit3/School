<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->unsignedBigInteger('blood_group_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('joining_date')->nullable();
            $table->bigInteger('mobile_no')->nullable();
            $table->mediumText('present_address')->nullable();
            $table->mediumText('permanent_address')->nullable();
            $table->string('photo')->nullable();
            $table->string('designation')->nullable();
            $table->string('qualification')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('linkedIn_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('account_no')->nullable();
            $table->boolean('status')->default(1);
            $table->string('deleted_status')->default(0);
            $table->string('deleted_at')->timestamps();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('blood_group_id')->references('id')->on('blood_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
