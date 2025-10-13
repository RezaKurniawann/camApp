<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('servers', function (Blueprint $table) {

            $table->dropForeign(['sub_location_id']);
            $table->dropColumn('sub_location_id');

            $table->foreignId('location_id')->after('brand_id')->constrained('locations')->onDelete('cascade');

            $table->string('sub_location')->after('location_id')->nullable();
        });

        Schema::table('cameras', function (Blueprint $table) {

            $table->dropForeign(['sub_location_id']);
            $table->dropColumn('sub_location_id');


            $table->dropColumn('coordinate');


            $table->foreignId('location_id')->after('category_id')->constrained('locations')->onDelete('cascade');

            $table->string('sub_location')->after('location_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('servers', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropColumn(['location_id', 'sub_location']);

            $table->foreignId('sub_location_id')->after('brand_id')->constrained('sub_locations')->onDelete('cascade');
        });

        Schema::table('cameras', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropColumn(['location_id', 'sub_location']);

            $table->foreignId('sub_location_id')->after('category_id')->constrained('sub_locations')->onDelete('cascade');
            $table->string('coordinate')->after('channel')->nullable();
        });
    }
};
