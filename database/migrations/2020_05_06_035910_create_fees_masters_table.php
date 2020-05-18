<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('group');
            $table->integer('types');
            $table->string('code');
            $table->string('date');
            $table->integer('amount');
            $table->integer('fine_type')->nullable();
            $table->string('percentage')->nullable();
            $table->string('fine_amount')->nullable();
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
        Schema::dropIfExists('fees_masters');
    }
}
