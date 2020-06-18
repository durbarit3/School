<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_drafts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->text('body')->nullable();
            $table->boolean('is_bulk_mail')->default(0);
            $table->boolean('is_replay_mail')->default(0);
            $table->boolean('is_send_mail')->default(0);
            $table->string('attachment')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->timestamps();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_drafts');
    }
}
