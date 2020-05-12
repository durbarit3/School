<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adminname');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('email_verified_at');
            $table->string('password');
            $table->string('role')->default(1);
            $table->string('remember_token');
            $table->string('verification_code');
            $table->string('status')->default(0);
            $table->string('avater')->default('admin.jpg');
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
        Schema::dropIfExists('admins');
    }
}
