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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->string('pesanan_id')->unique();
            $table->unsignedBigInteger('kamar_id');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('nomor_handphone');
            $table->string('email');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('adults');
            $table->integer('children');
            $table->integer('quantity')->default(1);
            $table->decimal('total_harga', 15, 2);
            $table->enum('status', ['pending','confirmed'])->default('pending'); 
            $table->timestamps();
            
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
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
