<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('user_details')->nullable();
            $table->string('subject')->nullable();
            $table->text('body')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('deleted_status')->nullable();
            $table->boolean('deleted_by')->nullable();
            $table->boolean('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
