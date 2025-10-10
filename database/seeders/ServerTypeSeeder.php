<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('server_types')->insert([
            ['code' => 'TYPE001', 'name' => 'Application Server', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'TYPE002', 'name' => 'Database Server', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'TYPE003', 'name' => 'Web Server', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'TYPE004', 'name' => 'Storage Server', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'TYPE005', 'name' => 'NVR Server', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}