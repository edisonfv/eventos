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
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('businessname');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->date('date_begin');
            $table->date('date_end');
            $table->integer('tne_id');
            $table->integer('profile_company');
            $table->boolean('active')->default(false);
            $table->unsignedBigInteger('plan_id');

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
        Schema::dropIfExists('companies');
    }
};
