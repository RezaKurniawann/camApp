<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('camera_details', function (Blueprint $table) {
            $table->dropForeign(['capture_id']);
            $table->dropColumn('capture_id');
            $table->json('details')->nullable()->after('images');
        });

        Schema::table('camera_details', function (Blueprint $table) {
            $table->dropColumn('images');
        });
    }

    public function down(): void
    {
        Schema::table('camera_details', function (Blueprint $table) {
            $table->json('images')->nullable();
            $table->dropColumn('details');
            $table->foreignId('capture_id')->constrained('captures')->onDelete('cascade');
        });
    }
};
