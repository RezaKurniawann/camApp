<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('servers')->insert([
            [
                'type_id' => 1,
                'brand_id' => 1,
                'sub_location_id' => 1,
                'noAsset' => 'SRV-001',
                'name' => 'App Server 01',
                'model' => 'PowerEdge R740',
                'portAvailable' => '48',
                'portUse' => '32',
                'hddSize' => '2TB',
                'ipAddress' => '192.168.1.10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type_id' => 2,
                'brand_id' => 2,
                'sub_location_id' => 1,
                'noAsset' => 'SRV-002',
                'name' => 'DB Server 01',
                'model' => 'ProLiant DL380',
                'portAvailable' => '24',
                'portUse' => '18',
                'hddSize' => '4TB',
                'ipAddress' => '192.168.1.11',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type_id' => 5,
                'brand_id' => 1,
                'sub_location_id' => 4,
                'noAsset' => 'SRV-003',
                'name' => 'NVR Server 01',
                'model' => 'PowerEdge R640',
                'portAvailable' => '16',
                'portUse' => '12',
                'hddSize' => '8TB',
                'ipAddress' => '192.168.2.10',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}