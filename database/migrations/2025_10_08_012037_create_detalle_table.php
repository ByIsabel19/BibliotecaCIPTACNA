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
        Schema::create('detalle', function (Blueprint $table) {
            $table->foreignId('id_item')->constrained('item')->cascadeOnDelete();
            $table->foreignId('id_universidad')->constrained('universidad')->cascadeOnDelete();
            $table->foreignId('id_carrera')->constrained('carrera')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle');
    }
};
