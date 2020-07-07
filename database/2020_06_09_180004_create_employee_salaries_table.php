<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->decimal('payable')->nullable();
            $table->decimal('due')->nullable();
            $table->decimal('total_paid')->nullable();
            $table->string('pay_mode')->nullable();
            $table->mediumText('earns')->nullable();
            $table->mediumText('earn_types')->nullable();
            $table->decimal('total_earn')->nullable();
            $table->mediumText('deductions')->nullable();
            $table->mediumText('deduction_types')->nullable();
            $table->decimal('total_deduction')->nullable();
            $table->bigInteger('vat')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_advance_salary')->default(0);
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('employee_salaries');
    }
}
