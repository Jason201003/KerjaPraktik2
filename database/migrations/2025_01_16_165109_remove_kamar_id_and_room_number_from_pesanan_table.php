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
            $table->dropForeign(['kamar_id']); // Menghapus foreign key constraint
            $table->dropColumn('kamar_id');   // Menghapus kolom kamar_id
            $table->dropColumn('room_number'); // Menghapus kolom room_number
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Kamar::class)->nullable()->constrained()->cascadeOnUpdate();
            $table->string('room_number');
        });
    }
};
