<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaptureSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('captures')->insert([
            ['code' => 'CAP001', 'name' => 'Motion Detection', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'CAP002', 'name' => 'Line Crossing', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'CAP003', 'name' => 'Intrusion Detection', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'CAP004', 'name' => 'Object Removal', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'CAP005', 'name' => 'Face Detection', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}