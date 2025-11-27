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
        Schema::table('lector', function (Blueprint $table) {
            // Eliminar FK incorrecta (si existe)
            $table->dropForeign(['id_usuario']);

            // Crear FK correcta hacia users
            $table->foreign('id_usuario')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lector', function (Blueprint $table) {
            // revertir los cambios por seguridad:

            $table->dropForeign(['id_usuario']);

            // si tu tabla anterior era 'usuario', ponla aquí:
            $table->foreign('id_usuario')->references('id')->on('usuario');
        });
    }
};
