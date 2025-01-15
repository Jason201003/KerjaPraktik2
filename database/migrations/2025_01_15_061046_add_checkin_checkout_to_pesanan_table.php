<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropColumn(['check_in', 'check_out']);
        });
    }

};
