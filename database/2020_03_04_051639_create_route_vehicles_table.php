<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('deleted_status')->nullable();
            $table->string('deleted_at')->timestamps();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_vehicles');
    }
}
