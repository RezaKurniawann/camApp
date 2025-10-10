<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CameraCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('camera_categories')->insert([
            ['code' => 'CAT001', 'name' => 'Indoor', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'CAT002', 'name' => 'Outdoor', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'CAT003', 'name' => 'Weather Resistant', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}