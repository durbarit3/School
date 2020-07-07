<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role');
            $table->string('issueby');
            $table->string('issueto');
            $table->string('issuedate');
            $table->string('returndate');
            $table->string('category');
            $table->string('item');
            $table->string('qty');
            $table->string('description');
            $table->string('deleted_by')->nullable();
            $table->string('deleted_at')->nullable();
            $table->string('deleted_status')->nullable();

            $table->integer('status')->default(1);

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
        Schema::dropIfExists('inventory_issues');
    }
}
