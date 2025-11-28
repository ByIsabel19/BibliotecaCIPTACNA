<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // MySQL: agregar columna id auto_increment; usar statement
        DB::statement('ALTER TABLE detalle ADD COLUMN id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE detalle DROP COLUMN id');
    }
};
