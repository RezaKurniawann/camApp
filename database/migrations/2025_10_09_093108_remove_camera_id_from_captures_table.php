<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('captures', function (Blueprint $table) {
            $table->dropForeign(['camera_id']);
            $table->dropColumn('camera_id');
        });
    }

    public function down(): void
    {
        Schema::table('captures', function (Blueprint $table) {
            $table->foreignId('camera_id')
                  ->constrained('cameras')
                  ->onDelete('cascade');
        });
    }
};
