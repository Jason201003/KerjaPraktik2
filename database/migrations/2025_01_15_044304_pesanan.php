<?php

use App\Models\Booking;
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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('booking_id'); // Singular sesuai konvensi Laravel
            $table->foreign('booking_id') // Perbaiki foreign key
                ->references('id')
                ->on('bookings')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('nomor_handphone');
            $table->string('email');
            $table->decimal('total_harga', 10, 2); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
