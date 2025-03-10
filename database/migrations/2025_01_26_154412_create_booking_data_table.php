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
    Schema::create('booking_data', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kamar_id')->constrained()->onDelete('cascade');
        $table->dateTime('start_time');
        $table->dateTime('end_time');
        $table->integer('quantity')->default(0); // Jumlah kamar yang dipesan
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_data');
    }
};
