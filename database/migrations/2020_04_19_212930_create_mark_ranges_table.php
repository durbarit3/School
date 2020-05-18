<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_ranges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('grade_point')->nullable();
            $table->string('min_percentage')->nullable();
            $table->string('max_percentage')->nullable();
            $table->mediumText('note')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('mark_ranges');
    }
}
