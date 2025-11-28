<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lector', function (Blueprint $table) {
            $table->id();
            $table->string('telefono_lector', 12);
            $table->string('cip_lector', 11);
            $table->unsignedBigInteger('id_usuario');

            $table->foreign('id_usuario')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lector');
    }
};
