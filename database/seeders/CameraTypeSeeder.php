<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CameraTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('camera_types')->insert([
            ['code' => 'CTYPE001', 'name' => 'Dome', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'CTYPE002', 'name' => 'Bullet', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'CTYPE003', 'name' => 'PTZ', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'CTYPE004', 'name' => 'Fisheye', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}