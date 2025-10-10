<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubLocationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sub_locations')->insert([
            ['location_id' => 1, 'code' => 'SUB001', 'name' => 'Building A - Floor 1', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 1, 'code' => 'SUB002', 'name' => 'Building A - Floor 2', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 2, 'code' => 'SUB003', 'name' => 'Main Building', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 3, 'code' => 'SUB004', 'name' => 'Server Room', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 4, 'code' => 'SUB005', 'name' => 'Production Area', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 4, 'code' => 'SUB006', 'name' => 'Warehouse', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}