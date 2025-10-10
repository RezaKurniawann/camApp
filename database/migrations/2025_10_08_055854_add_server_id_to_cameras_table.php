<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cameras', function (Blueprint $table) {
            $table->foreignId('server_id')
                ->after('id')
                ->nullable()
                ->constrained('servers')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('cameras', function (Blueprint $table) {
            $table->dropForeignIdFor('servers');
        });
    }
};


