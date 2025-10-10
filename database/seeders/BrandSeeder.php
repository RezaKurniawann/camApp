<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('brands')->insert([
            ['code' => 'BRD001', 'name' => 'Dell', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'BRD002', 'name' => 'HP', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'BRD003', 'name' => 'Hikvision', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'BRD004', 'name' => 'Dahua', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'BRD005', 'name' => 'Axis', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'BRD006', 'name' => 'Lenovo', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}