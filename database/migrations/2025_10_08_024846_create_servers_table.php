<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('server_types')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('sub_location_id')->constrained('sub_locations')->onDelete('cascade');
            $table->string('noAsset');
            $table->string('name');
            $table->string('model');
            $table->string('portAvailable');
            $table->string('portUse');
            $table->string('hddSize');
            $table->string('ipAddress')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('servers');
    }
};