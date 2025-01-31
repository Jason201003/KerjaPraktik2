<?php

use App\Models\Category;
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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('room_number'); 
            $table->integer('kapasitas'); 
            $table->string('tipe_bed'); 
            $table->decimal('harga')->nullable();
            $table->enum('status', ['booked','unbooked'])->default('unbooked'); 
            $table->foreignIdFor(Category::class)->nullable()->constrained()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
            $table->index('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
