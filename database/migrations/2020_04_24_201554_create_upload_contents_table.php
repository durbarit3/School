<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_contents', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('publish_date')->nullable();
            $table->string('published_by')->nullable();
            $table->mediumText('note')->nullable();
            $table->string('attachment_file')->nullable();
            $table->boolean('is_all_class')->nullable();
            $table->boolean('is_for_all_class')->nullable();
            $table->boolean('is_according_to_subject')->nullable();
            $table->boolean('deleted_status')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('attachment_types')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_contents');
    }
}
