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
        Schema::table('cashregisters', function (Blueprint $table) {
            $table
                ->foreign('subsidiary_id')
                ->references('id')
                ->on('subsidiaries')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cashregisters', function (Blueprint $table) {
            $table->dropForeign(['subsidiary_id']);
        });
    }
};
