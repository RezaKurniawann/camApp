<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('locations')->insert([
            ['company_id' => 1, 'code' => 'LOC001', 'name' => 'Jakarta Office', 'created_at' => now(), 'updated_at' => now()],
            ['company_id' => 1, 'code' => 'LOC002', 'name' => 'Bandung Office', 'created_at' => now(), 'updated_at' => now()],
            ['company_id' => 2, 'code' => 'LOC003', 'name' => 'Surabaya Office', 'created_at' => now(), 'updated_at' => now()],
            ['company_id' => 3, 'code' => 'LOC004', 'name' => 'Cikarang Plant', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}