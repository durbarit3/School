<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('income_header_id');
            $table->double('amount');
            $table->string('date');
            $table->string('year');
            $table->string('month');
            $table->mediumText('note')->nullable();
            $table->boolean('status')->default(1);
            $table->string('deleted_status')->nullable();
            $table->string('deleted_at')->timestamps();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->foreign('income_header_id')->references('id')->on('income_headers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
