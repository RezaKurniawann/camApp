<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('camera_variant_id')->constrained('camera_variants')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('camera_types')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('camera_categories')->onDelete('cascade');
            $table->foreignId('sub_location_id')->constrained('sub_locations')->onDelete('cascade');
            $table->string('noAsset');
            $table->string('name');
            $table->string('model');
            $table->string('lens');
            $table->string('resolution');
            $table->string('ipAddress')->nullable();
            $table->string('channel');
            $table->string('coordinate')->nullable();
            $table->string('purpose');
            $table->string('images')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cameras');
    }
};