<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_withdraws', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('bank_account_id')->nullable();
            $table->unsignedBigInteger('voucher_header_id')->nullable();
            $table->string('date')->nullable();
            $table->string('refer')->nullable();
            $table->string('remarks')->nullable();
            $table->bigInteger('withdraw_amount')->nullable();
            $table->bigInteger('after_withdraw_balance')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('deleted_status')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onDelete('cascade');
            $table->foreign('voucher_header_id')->references('id')->on('voucher_headers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_withdraws');
    }
}
