<?php

use App\Models\Booking;
use App\Models\Kamar;
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
            $table->foreignIdFor(Kamar::class)->nullable()->constrained()->cascadeOnUpdate();
            $table->string('room_number');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('nomor_handphone');
            $table->string('email');
            $table->decimal('total_harga', 10, 2); 
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
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
