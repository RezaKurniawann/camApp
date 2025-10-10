<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->insert([
            ['code' => 'COMP001', 'name' => 'PT. ABC Indonesia', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'COMP002', 'name' => 'PT. XYZ Corporation', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'COMP003', 'name' => 'PT. Tech Solutions', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}