<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['booking_id']); 

            // Remove the `booking_id` column
            $table->dropColumn('booking_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            // Re-add the `booking_id` column
            $table->unsignedBigInteger('booking_id');

            // Re-add the foreign key constraint
            $table->foreign('booking_id')
                ->references('id')
                ->on('bookings')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
};
