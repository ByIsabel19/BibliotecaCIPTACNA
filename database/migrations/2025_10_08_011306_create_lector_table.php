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
        Schema::create('lector', function (Blueprint $table) {
            $table->id();
            $table->string('telefono_lector',12);
            $table->string('cip_lector',11);
            $table->foreignId('id_usuario')->constrained('usuario')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lector');
    }
};
