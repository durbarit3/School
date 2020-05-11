<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpanseHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expanse_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('status');
            $table->string('deleted_status')->nullable();
            $table->string('deleted_at')->timestamps();
            $table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('expanse_headers');
    }
}
