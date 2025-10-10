<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('captures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('camera_id')->constrained('cameras')->onDelete('cascade');
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('captures');
    }
};