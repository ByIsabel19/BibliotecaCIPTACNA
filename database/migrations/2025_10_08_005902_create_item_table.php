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
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_categoria')->constrained('categoria')->cascadeOnDelete();
            $table->string('nombre_item',200);
            $table->year('anio_item');
            $table->tinyInteger('disco_item')->default(0)->comment('0 = no tiene disco, 1 = tiene disco');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
