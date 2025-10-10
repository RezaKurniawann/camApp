<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CameraVariantSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('camera_variants')->insert([
            ['code' => 'VAR001', 'name' => 'Standard', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'VAR002', 'name' => 'Night Vision', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'VAR003', 'name' => 'Smart Detection', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'VAR004', 'name' => 'AI Enhanced', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}