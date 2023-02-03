<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->decimal('value');
            $table->text('description')->nullable();
            $table->string('supplier');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->string('result');
            $table->string('errCode');
            $table->string('errorDescription');
            $table->string('userPaymentOptionId');
            $table->string('ccCardNumber');
            $table->string('bin');
            $table->string('last4Digits');
            $table->string('ccExpMonth');
            $table->string('ccExpYear');
            $table->string('transactionId');
            $table->string('threeDReason');
            $table->string('threeDReasonId');
            $table->string('challengeCancelReasonId');
            $table->lineString('challengeCancelReason');
            $table->boolean('cancelled');
            $table->date('date_begin');
            $table->date('date_end');

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
        Schema::dropIfExists('payments');
    }
};
